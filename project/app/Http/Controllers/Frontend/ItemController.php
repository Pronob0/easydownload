<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AuthorBadge;
use App\Models\AuthorLevel;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Currency;
use App\Models\Item;
use App\Models\OrderedItem;
use App\Models\Rating;
use App\Models\Reply;
use App\Models\Screenshot;
use App\Models\Subcategory;
use App\Models\Trending;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
class ItemController extends Controller
{
 public function item(Request $request){


    $trend=Trending::first();
    $date=Carbon::now()->subDays($trend->day);

    $trend_info = OrderedItem::where('created_at','>',$date)->groupBy('item_id')->select('item_id', DB::raw('count(*) as total'))->orderby('total','desc')->get();
    if($trend_info->count()>0){
        foreach($trend_info as $tr){
            $data['trending'][]=Item::where('id',$tr->item_id)->first()->id;
        }
        $trending=$data['trending'];


    }
    else{
        $trending=[];
    }


        $tags = null;
        $tagz = '';
        $name = Item::pluck('tags')->toArray();
        foreach($name as $nm)
        {
            $tagz .= $nm.',';
        }
        if(Session::has('currency')){
            $curr = Currency::findOrFail(Session::get('currency'));
        }else{
            $curr = Currency::whereIsDefault(1)->first();
        }

        $data['categories'] = Category::orderBy('id','desc')->where('status',1)->get();

        $category = $request->has('category') ? Category::whereSlug($request->category)->first() : '';
        $subcategory = $request->has('subcategory') ? Subcategory::whereSlug($request->subcategory)->first() : '';
        $sort = $request->has('sortby') ? $request->sortby : '';
        $tags = $request->has('tags') ? $request->tags : [];
        $max = $request->has('max') ? (int)round($request->max / $curr->value) : '';
        $min = $request->has('min') ? (int)round($request->min / $curr->value) : '';
        $search = $request->has('search') ? $request->search : '';



        $data['admin'] = Admin::First();

        $data['items'] = Item::when($category,function($query,$category){
                                return $query->where('category_id',$category->id);
                            })
                            ->when($min, function($query, $min) {
                                return $query->where('regular_price', '>=', $min);
                              })
                            ->when($max, function($query, $max) {
                                return $query->where('regular_price', '<=', $max);
                            })
                            ->when($tags,function($query,$tags){
                              return $query->where('tags', 'like', '%' . $tags . '%');
                            })
                            ->when($search,function($query,$search){
                                return $query->where('name', 'like', '%' . $search . '%');
                              })
                            ->when($sort, function ($query, $sort) {
                                if ($sort=='date_desc') {
                                  return $query->orderBy('id', 'DESC');
                                }
                                elseif($sort=='date_asc') {
                                  return $query->orderBy('id', 'ASC');
                                }
                                elseif($sort=='price_desc') {
                                  return $query->orderBy('regular_price', 'DESC');
                                }
                                elseif($sort=='price_asc') {
                                  return $query->orderBy('regular_price', 'ASC');
                                }
                             })
                             ->when(empty($sort), function ($query, $sort) {
                                return $query->orderBy('id', 'DESC');
                            })
                            ->where('status','completed')->orderBy('id','desc')->paginate(6);

                            $data['tags'] = array_unique(explode(',',$tagz));
                            if($request->ajax()){
                              return view('includes.search_item',$data,compact('trend','trending'));
                            }else{
                              return view('frontend.item',$data,compact('trend','trending'));
                            }

    }


    public function details($slug){

       $data['item'] = Item::where('slug',$slug)->first();
        $data['admin'] = Admin::First();
        $data['attributes'] = json_decode($data['item']->attributes,true);
        $data['levels']=AuthorLevel::where('status',1)->orderBy('amount','DESC')->get();
        $data['max']=DB::table('author_levels')->where('amount', DB::raw("(select max(`amount`) from author_levels)"))->where('status',1)->first();
        $data['badges']=AuthorBadge::where('status',1)->orderBy('days','DESC')->orderBy('time','DESC')->get();
        if(Auth::user()){
            $id=Auth::user()->id;
            $data['follow']=Follow::where('following_id',$data['item']->user->id)->where('follower_id',$id)->first();
        }

        $data['tags']  = array_unique(explode(',',$data['item']->tags));
        $data['screenshots']=Screenshot::where('item_id',$data['item']->id)->get();



        return view('frontend.item-details',$data);
    }
    public function reviewsubmit(Request $request)
  {
    $ck = 0;
    $carts = OrderedItem::join('orders', 'orders.id', '=', 'ordered_items.order_id')
                          ->select('ordered_items.item_id')
                          ->where('orders.user_id', Auth::user()->id)
                          ->get();

    foreach ($carts as $cart) {
        if ($request->item_id == $cart->item_id) {
          $ck = 1;
          break;
        }
    }

    if ($ck == 1) {
      $user = Auth::guard('web')->user();
      $prev = Rating::where('item_id', '=', $request->item_id)->where('user_id', '=', $user->id)->get();

      if (count($prev) > 0) {
        return response()->json(array('errors' => [0 => 'You Have Reviewed Already.']));
      }
      $Rating = new Rating;
      $Rating->fill($request->all());
      $Rating->save();
      $data[0] = 'Your Rating Submitted Successfully.';
      $data[1] = Rating::rating($request->item_id);
      return response()->json($data);
    } else {
      return response()->json(array('errors' => [0 => 'Buy This item First']));
    }
  }
  public function reviews($id)
  {
    $item = Item::find($id);
    return view('load.reviews', compact('item', 'id'));
  }

  public function comment(Request $request)
  {
      $comment = new Comment();
      $input = $request->all();
      $comment->fill($input)->save();
      $comments = Comment::where('item_id','=',$request->item_id)->get()->count();
      $data[0] = $comment->user->photo ? url('assets/images/'.$comment->user->photo):url('assets/images/placeholder.jpg');
      $data[1] = $comment->user->name;
      $data[2] = $comment->created_at->diffForHumans();
      $data[3] = $comment->text;
      $data[4] = $comments;
      $data[5] = route('item.comment.delete',$comment->id);
      $data[6] = route('item.comment.edit',$comment->id);
      $data[7] = route('item.reply',$comment->id);
      $data[8] = $comment->user->id;
      return response()->json($data);
  }

  public function commentedit(Request $request,$id)
  {
      $comment =Comment::findOrFail($id);
      $comment->text = $request->text;
      $comment->update();
      return response()->json($comment->text);
  }

  public function commentdelete($id)
  {
      $comment =Comment::findOrFail($id);
      if($comment->replies->count() > 0)
      {
          foreach ($comment->replies as $reply) {
              $reply->delete();
          }
      }
      $comment->delete();
  }

  public function reply(Request $request,$id)
  {
      $reply = new Reply();
      $input = $request->all();
      $input['comment_id'] = $id;
      $reply->fill($input)->save();
      $data[0] = $reply->user->photo ? public_path('assets/images/'.$reply->user->photo):url('assets/images/placeholder.jpg');
      $data[1] = $reply->user->name;
      $data[2] = $reply->created_at->diffForHumans();
      $data[3] = $reply->text;
      $data[4] = route('item.reply.delete',$reply->id);
      $data[5] = route('item.reply.edit',$reply->id);
      return response()->json($data);
  }

  public function replyedit(Request $request,$id)
  {
      $reply = reply::findOrFail($id);
      $reply->text = $request->text;
      $reply->update();
      return response()->json($reply->text);
  }

  public function replydelete($id)
  {
      $reply =Reply::findOrFail($id);
      $reply->delete();
  }
}
