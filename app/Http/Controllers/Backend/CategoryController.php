<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use File;
use Session;

class CategoryController extends Controller
{
    public function category_all(){
       
       $category=Category::OrderBy('id','desc')->get();

       return view('backend.admin.pages.category.category')->with('category',$category);


    }

    public function category_create(){
    	$category=Category::OrderBy('id','desc')->where('parent_id',NULL)->get();
    	return view('backend.admin.pages.category.create',compact('category'));
    }

    public function category_store(Request $request){
        
        $this->validate($request,[
              'name' => 'required|unique:categories|max:150',
              'description' => 'required|max:255',
              // 'image' => 'nullable|image',

        ],

        [
        	'name.required'=>'Please Provide a Name',
        	'description.required'=>'Please Provide a Description',
        	// 'image.image'=>'Please Provide a image file',

        ]);

        $category = new Category;

        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
          
        if($request->hasFile('image')){
        	$image=$request->file('image');
        	$image_name=hexdec(uniqid());
         	$ext=strtolower($image->getClientOriginalExtension());
         	$image_full_name= $image_name.'.'.$ext;
         	$upload_path=('image/category/');
         	$image_url=$upload_path.$image_full_name;
         	$image->move($upload_path,$image_full_name);
         	$category->image=$image_url;
        }


        $category->save();
        Session::flash('Success','Successfully Added');
        
        return redirect()->route('admin.category.all');

    }

    public function category_edit($id){
        
        $category=Category::find($id);
        $main_category=Category::OrderBy('id','desc')->where('parent_id',NULL)->get();

        return view('backend.admin.pages.category.edit',compact('category','main_category'));

    }

    public function category_update(Request $request,$id){
      $this->validate($request,[
              'name' => 'required|max:150',
              'description' => 'required|max:255',
              // 'image' => 'nullable|image',

        ],

        [
          'name.required'=>'Please Provide a Name',
          'description.required'=>'Please Provide a Description',
          // 'image.image'=>'Please Provide a image file',

        ]);

        $category =Category::find($id);

        $category->name=$request->name;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
          
        if($request->hasFile('image')){
          // if($request->has('oldImage')){
          //   unlink($request->oldImage);
          // }
          if(File::exists($request->oldImage)){
            File::delete($request->oldImage);
          }
          
          $image=$request->file('image');
          $image_name=hexdec(uniqid());
          $ext=strtolower($image->getClientOriginalExtension());
          $image_full_name= $image_name.'.'.$ext;
          $upload_path=('image/category/');
          $image_url=$upload_path.$image_full_name;
          $image->move($upload_path,$image_full_name);
          $category->image=$image_url;
        }
        else{
          $image_url=$request->oldImage;
          $category->image=$image_url;



        }

        $category->save();
      Session::flash('Success','Successfully Updated');
      
        return redirect()->route('admin.category.all');
    }

    public function category_delete($id){
      $category=Category::find($id);
      $category->delete();
      Session::flash('delete','Successfully Deleted');
      return redirect()->route('admin.category.all');
    }
}
