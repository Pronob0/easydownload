<?php
use App\Models\OrderedItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

if (! function_exists('code_image')) {

      // Capcha Code Image
      function code_image()
      {
          $actual_path = str_replace('project','',base_path());
          $image = imagecreatetruecolor(200, 50);
          $background_color = imagecolorallocate($image, 255, 255, 255);
          imagefilledrectangle($image,0,0,200,50,$background_color);

          $pixel = imagecolorallocate($image, 0,0,255);
          for($i=0;$i<500;$i++)
          {
              imagesetpixel($image,rand()%200,rand()%50,$pixel);
          }

          $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
          $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          $length = strlen($allowed_letters);
          $letter = $allowed_letters[rand(0, $length-1)];
          $word='';
          //$text_color = imagecolorallocate($image, 8, 186, 239);
          $text_color = imagecolorallocate($image, 0, 0, 0);
          $cap_length=6;// No. of character in image
          for ($i = 0; $i< $cap_length;$i++)
          {
              $letter = $allowed_letters[rand(0, $length-1)];
              imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
              $word.=$letter;
          }
          $pixels = imagecolorallocate($image, 8, 186, 239);
          for($i=0;$i<500;$i++)
          {
              imagesetpixel($image,rand()%200,rand()%50,$pixels);
          }
          session(['captcha_string' => $word]);
          imagepng($image, $actual_path."assets/images/capcha_code.png");
      }
  }


  if (! function_exists('check_lowercase_string')) {
    function check_lowercase_string($string) {
        $chars = '';
        // map all small chars
        for($alpha = 'a'; $alpha != 'aa'; $alpha++) { $small[] = $alpha; }
        $l = 0; // not strlen() :p
        while (@$string[$l] != '') {
            $l++;
        }
        for($i = 0; $i < $l; $i++) { // for each string input piece
            foreach($small as $letter) { // for each mapped letter
                if($string[$i] == $letter) {
                    $chars .= $letter; // simple filter
                }
            }
        }

        // if they are still equal in the end then true, if they are not, false
        return ($chars === $string);
    }
  }


  if(!function_exists('time_elapsed_string')) {
      function time_elapsed_string($datetime, $full = false) {
          $now = new DateTime;
          $ago = new DateTime($datetime);
          $diff = $now->diff($ago);

          $diff->w = floor($diff->d / 7);
          $diff->d -= $diff->w * 7;

          $string = array(
              'y' => 'year',
              'm' => 'month',
              'w' => 'week',
              'd' => 'day',
              'h' => 'hour',
              'i' => 'minute',
              's' => 'second',
          );
          foreach ($string as $k => &$v) {
              if ($diff->$k) {
                  $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
              } else {
                  unset($string[$k]);
              }
          }

          if (!$full) $string = array_slice($string, 0, 1);
          return $string ? implode(', ', $string) . ' ago' : 'just now';
      }
  }


  if(!function_exists('deleteDir')) {
    function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
  }

  if(!function_exists('sortByTime')) {
    function sortByTime($x, $y) {
        return $x['id'] - $y['id'];
    }
  }

  if(!function_exists('findById')) {
    function findById($id) {
        $cart = session()->get('cart');
        $item = '';
        if (!empty($cart)) {
            foreach ($cart as $key => $element) {
                if ($element['id'] == $id) {
                    $item = $element;
                    break;
                }
            }
        }
        return $item;
    }
  }

  if(!function_exists('findIndex')) {
    function findIndex($id) {
        $cart = session()->get('cart');
        $index = '';
        if (!empty($cart)) {
            foreach ($cart as $key => $element) {
                if ($element['id'] == $id) {
                    $index = $key;
                    break;
                }
            }
        }
        return $index;
    }
  }

  if(!function_exists('cartTotalWithoutTax')) {
    function cartTotalWithoutTax() {
        $cart = session()->get('cart');

        $gs = DB::table('generalsettings')->first();

        if (Session::has('currency'))
        {
            $curr = DB::table('currencies')->find(Session::get('currency'));
        }
        else
        {
            $curr = DB::table('currencies')->where('is_default','=',1)->first();
        }


        if (!empty($cart)) {
            $total = 0;
            foreach ($cart as $key => $cartItem) {
                $total += $cartItem["total_price"];
            }
            $price = round($total * $curr->value,2);

            if($gs->currency_format == 0){
                return $curr->sign.$price;
            }
            else{
                return $price.$curr->sign;
            }

        } else {
            return 0;
        }
    }
  }


  if(!function_exists('cartTotal')) {
    function cartTotal() {
        $cart = session()->get('cart');

        $gs = DB::table('generalsettings')->first();

        if (Session::has('currency'))
        {
            $curr = DB::table('currencies')->find(Session::get('currency'));
        }
        else
        {
            $curr = DB::table('currencies')->where('is_default','=',1)->first();
        }


        if (!empty($cart)) {
            $total = 0;
            foreach ($cart as $key => $cartItem) {
                $total += $cartItem["total_price"];
            }
            if($gs->tax){
                $percentage = ($total * $gs->tax) / 100;
                $total = $percentage + $total;
                return round($total * $curr->value,2);
            }
           
            else{
                return round($total * $curr->value,2);
            }
        } else {
            return 0;
        }
    }
  }

  if(!function_exists('cartSinglePrice')){
    function cartSinglePrice($price){
        if (Session::has('currency'))
        {
            $curr = DB::table('currencies')->find(Session::get('currency'));
        }
        else
        {
            $curr = DB::table('currencies')->where('is_default','=',1)->first();
        }

        return round($price*$curr->value,2);
    }
  }



  if(!function_exists('support_date')) {
    function support_date($oiId) {
        $oi = OrderedItem::find($oiId);

        if (!empty($oi->support_valid_till)) {

            if ($oi->support_valid_till != 'expired') {
                $today = Carbon::now();
                $today = $today->toDateString();
                $today = Carbon::parse($today);

                $validity = Carbon::parse($oi->support_valid_till);
                $validity = $validity->toDateString();
                $validity = Carbon::parse($validity);


                if ($today->gt($validity)) {
                    return "expired";
                } else {
                    return date('jS M, Y', strtotime($oi->support_valid_till)) . " (Valid Till)";
                }
            } else {
                return "expired";
            }
        } else {
            return '';
        }


    }
  }

  if(!function_exists('newRefunds')) {
    function newRefunds($authorId) {
        $newRefunds = OrderedItem::join('items', 'items.id', '=', 'ordered_items.item_id')->where('items.user_id', $authorId)->where('ordered_items.refund', 1)->where('ordered_items.refund_seen', 0)->count();
        return $newRefunds;
    }
  }


?>
