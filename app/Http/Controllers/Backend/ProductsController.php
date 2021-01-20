<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Session;

class ProductsController extends Controller
{
    // public function index(){

    // 	return view('admin.pages.index');
    // }

    public function product_create(){

    	return view('backend.admin.pages.product.create');
    }

     public function product_store(Request $request){
     	$request->validate([
        'title' => 'required|unique:products|max:150',
        'description' => 'required|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        // 'images' => 'required',
    ]);
     
     $product = new Product;
     $product->title=$request->title;
     $product->description=$request->description;
     $product->price=$request->price;
     $product->quantity=$request->quantity;
      
     $product->slug=str_slug($request->title);  
     $product->category_id=1;
     $product->brand_id=1;
     $product->admin_id=1;

     $product->save();
     
     if($request->hasFile('images')){
     	foreach ($request->file('images') as  $image) {
     		$image_name=hexdec(uniqid());
         	$ext=strtolower($image->getClientOriginalExtension());
         	$image_full_name= $image_name.'.'.$ext;
         	$upload_path=('image/product/');
         	$image_url=$upload_path.$image_full_name;
         	$image->move($upload_path,$image_full_name);

         	$productImage= new ProductImage;

         	$productImage->product_id=$product->id;
         	$productImage->image=$image_url;

         	$productImage->save();         	

     	}
     	
     }
     Session::flash('Success','Successfully Added');
     return redirect()->route('admin.product.create');

    	
    }

     public function product_all(){
     	$product=Product::OrderBy('id','desc')->get();
    	return view('backend.admin.pages.product.product')->with('products',$product);
    }

      public function product_edit($id){
        $single_product=Product::findorfail($id);
    
    	return view('backend.admin.pages.product.edit')->with('product',$single_product);
    }

       public function product_update(Request $request,$id){
        $request->validate([
        'title' => 'required|max:150',
        'description' => 'required|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        
    ]);
     
     $product =Product::find($id);
     $product->title=$request->title;
     $product->description=$request->description;
     $product->price=$request->price;
     $product->quantity=$request->quantity;
     $product->slug=str_slug($request->title); 

     $product->save();
     
     // if($request->hasFile('images')){
     // 	foreach ($request->file('images') as  $image) {
     // 		$image_name=hexdec(uniqid());
     //     	$ext=strtolower($image->getClientOriginalExtension());
     //     	$image_full_name= $image_name.'.'.$ext;
     //     	$upload_path=('image/product/');
     //     	$image_url=$upload_path.$image_full_name;
     //     	$image->move($upload_path,$image_full_name);

     //     	$productImage= new ProductImage;

     //     	$productImage->product_id=$product->id;
     //     	$productImage->image=$image_url;

     //     	$productImage->save();         	

     // 	}
     	
     // }
     Session::flash('Success','Successfully Updated');
     return redirect()->route('admin.product.all');
    
    }

    public function product_delete($id){
        $single_product=Product::findorfail($id);
        
        if(!is_null($single_product)){
        $single_product->delete();
        }

        session()->flash('delete','Successfully Deleted');
        
    
    	return redirect()->route('admin.product.all');
    }

}

