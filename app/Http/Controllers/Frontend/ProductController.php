<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $product=Product::OrderBy('id','desc')->paginate(12);
    	return view('frontend.products.index')->with('products',$product);
    }

    public function show($slug){
    	$products=Product::where('slug',$slug)->first();
    	if (!is_null($products)) {
    	return view('frontend.products.show')->with('products',$products);
    	}else{
    		return redirect()->route('products');
    	}
    	
    	
    }

    public function search(Request $request){
        $search=$request->search;
        
        $products=Product::orWhere('title','like','%'.$search.'%')
        ->orWhere('description','like','%'.$search.'%')
        ->orWhere('price','like','%'.$search.'%')
        ->orWhere('quantity','like','%'.$search.'%')
        ->OrderBy('id','desc')
        ->get();
        return view('frontend.products.search',compact('products','search'));
    }

}
