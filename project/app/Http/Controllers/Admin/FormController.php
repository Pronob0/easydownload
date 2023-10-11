<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Field;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function create($catid) {
        $data['category_id'] = $catid;
        $data['category'] = Category::find($catid);
      return view('admin.form.create', $data);
    }

    public function edit($id) {
      $data['field'] = Field::find($id);
      if (!empty($data['field']->options)) {
        $options = $data['field']->options;
        $data['options'] = $options;
        $data['counter'] = count($options);
      }
      $data['category'] = $data['field']->category;
      return view('admin.form.edit', $data);
    }

    public function store(Request $request) {
      $blfileds = ['name', 'key_features', 'html_description', 'thumbnail', 'theme_preview', 'main_files', 'wordpress_theme', 'release_forms', 'video_preview'];
      $catid = $request->category_id;

      $cat = Category::find($catid);
      if (!empty($cat->fields)) {
        foreach ($cat->fields as $field) {
          $blfileds[] = strtolower($field->label);
        }
      }


      if (in_array(strtolower($request->label), $blfileds)) {
        Session::flash('alert', 'This input field already exists for this category');
        return back();
      }

      $messages = [
        'options.*.required_if' => 'Options are required if field type is select dropdown / checkbox / radio button',
        'placeholder.required_unless' => 'The placeholder field is required unless field type is checkbox / radio button'
      ];

      $rules = [
        'label' => 'required',
        'placeholder' => 'required_unless:type,3,5',
        'type' => 'required',
        'options.*' => 'required_if:type,2,3,5',
      ];

      $request->validate($rules, $messages);

      $field = new Field;
      $field->category_id = $request->category_id;
      $field->type = $request->type;
      $field->label = $request->label;
      $field->name = Str::slug($request->label, '_');
      $field->placeholder = $request->placeholder;
      $field->note = $request->note;
      $field->required = $request->required;
      $field->save();

      if ($request->type == 2 || $request->type == 3 || $request->type == 5) {
        $options = $request->options;
        foreach ($options as $key => $option) {
          $op = new Option;
          $op->field_id = $field->id;
          $op->name = $option;
          $op->save();
        }
      }

      Session::flash('success', 'Field created successfully!');
      return back();

    }

    public function formUpdate(Request $request) {
      $blfileds = ['name', 'key_features', 'html_description', 'thumbnail', 'theme_preview', 'main_files', 'wordpress_theme', 'release_forms', 'video_preview'];
      $catid = $request->category_id;
      $cat = Category::find($catid);
      $currfield = Field::find($request->field_id);

      if (!empty($cat->fields)) {
        foreach ($cat->fields as $field) {
          if ($currfield->id == $field->id) {
            continue;
          }
          $blfileds[] = strtolower($field->label);
        }
      }


      if (in_array(strtolower($request->label), $blfileds)) {
        Session::flash('alert', 'This input field already exists for this category');
        return back();
      }


      $messages = [
        'options.required_if' => 'Options are required',
        'options.*.required_if' => 'Options are required',
        'placeholder.required_unless' => 'Placeholder is required',
      ];

      $request->validate([
        'label' => 'required',
        'placeholder' => 'required_unless:type,3,5',
        'options' => 'required_if:type,2,3,5',
        'options.*' => 'required_if:type,2,3,5',
      ], $messages);


      $field = Field::find($request->field_id);
      $field->label = $request->label;
      $field->name = Str::slug($request->label, '_');
      // if field is checkbox / radio then placeholder is not required
      if ($request->type != 3 || $request->type != 5) {
        $field->placeholder = $request->placeholder;
      }
      $field->required = $request->required;
      $field->note = $request->note;
      $field->save();

      if ($request->type == 2 || $request->type == 3 || $request->type == 5) {
        $field->options()->delete();
        $options = $request->options;
        foreach ($options as $key => $option) {
          $op = new Option;
          $op->field_id = $field->id;
          $op->name = $option;
          $op->save();
        }
      }

      Session::flash('success', 'Input field updated!');
      return back();

    }

    public function fieldDelete(Request $request) {
      $field = Field::find($request->field_id);
      if ($field->options()->count() > 0) {
        $field->options()->delete();
      }
      $field->delete();
      Session::flash('success', 'Input field deleted!');
      return back();
    }

    public function options($id) {
      $options = Option::where('field_id', $id)->get();
      return $options;
    }
}
