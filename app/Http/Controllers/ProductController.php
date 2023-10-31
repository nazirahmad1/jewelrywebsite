<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(){
        $product=ProductModel::all();

        return view('index',['product'=>$product]);
    }
    public function about(){
        return view('about');
    }
    public function blog(){
        return view('blog');
    }
    public function shop(){
        $product=ProductModel::all();

        return view('shop',['product'=>$product]);

    }
    public function dashboard(){
        return view('dashboard');
    }
    public function create(){
        return view('create');
    }

    public function store(Request $request){
      try {
          // $request->validate([
        //     'name'=>'required',
        //     'price'=>'required',
        //     'image'=>'required|mimes:jpeg,jpg,png,gif'
        // ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new ProductModel();
        $product->image=$imageName;
        $product->name=$request->name;
        $product->price=$request->price;
        
      // Save the product to MongoDB
      $product->save();
      
       return back()->withSuccess('Product successfuly created!'); 
      } catch (\Throwable $e) {
        return $e;
      }
    
    }

    public function showall(){
        $product=ProductModel::all();

        return view('dashboard',['product'=>$product]);
    }

    public function edit($id){
        $product=ProductModel::where('_id',$id)->first();
        

        return view('edit',['product'=>$product]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $product=ProductModel::where('_id',$id)->first();

        if(isset($request->image)){
            // upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image=$imageName;
        }
      
        $product->name=$request->name;
        $product->price=$request->price;
        $product->save();

       return back()->withSuccess('Product successfuly update!'); 

    }

    public function destroy($id){
        $product = ProductModel::where('_id',$id)->first();
         $product->delete();
        return back()->withSuccess('Product successfully deleted!!');
    }

    public function productDetail($id){
        $product=ProductModel::where('_id',$id)->first();

        return view('productDetail',['product'=>$product]);
    }

}
