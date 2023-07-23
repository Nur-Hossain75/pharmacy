<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $product;
    public function index()
    {
        $product = product::all();
        return view('home.index',['products'=>$product]);
    }

    public function add()
    {
        return view('product.index');
    }

    public function upload(Request $request)
    {
        $this->product= product:: newUpload($request);
        return back()->with('message', 'Product Update Successfully');
    }

    public function manage()
    {
        $product = product::all();
        return view('product.manage',['products'=>$product]);
    }

    public function delete($id)
    {
        $this->product = product:: deleteProduct($id);
        return back()->with('message', 'Product Update Successfully');
        
    }

    public function edit($id){
        $product = product::find($id);
        return view('product.edit',['products'=>$product]);
    }

    public function update(Request $r)
    {
        $product = product::find($r->id);
        if ($r->image) {
            if(file_exists($product->image)){
                unlink($product->image);
            }
                $image= $r->image;
                $imgEx= $image->getClientOriginalExtension();
                $imgName= 'product-image'.time().'.'.$imgEx;
                $image->move(public_path('/product-images'),$imgName);
                $productImg= 'product-images/'.$imgName;
                $product->image = $productImg;
        }
                $product->name = $r->name;
                $product->stock_amount = $r->stock_amount;
                $product->price = $r->price;
                $product->description = $r->description;
                $product->status = $r->status;

                $product->save();
                return  back()->with('message','Product Update Successfully.');
    }
}
