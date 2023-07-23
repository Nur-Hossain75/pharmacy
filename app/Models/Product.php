<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    private static $product, $image, $imageName, $directory, $imageUrl;
    
    public static function newUpload($request)
    {
        self::$product = new product();

        if($request->image){
            self::$image     = $request->file('image');
            self::$imageName = time().'.'.self::$image->getClientOriginalName();
            self::$directory = 'product-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl  = self::$directory.self::$imageName;
        }

        self::$product->name = $request->name;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        self::$product->image = self::$imageUrl;
        self::$product->status = $request->status;
        self::$product->save();
        return self::$product;
    }

    public static function deleteProduct($id) {
        self::$product = product::find($id);

        if(file_exists(self::$product->image)){
            unlink(self::$product->image);
        }
        self::$product->delete();
    }
}
