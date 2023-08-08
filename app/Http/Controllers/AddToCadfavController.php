<?php

namespace App\Http\Controllers;

use App\Models\AddToCadfav;
use App\Models\Product;
use Illuminate\Http\Request;

class AddToCadfavController extends Controller
{
    public function addToCard($product_id)
    {
        Product::findOrFail($product_id);
        $existingRecord = AddToCadfav::where('user_id', auth()->id())
            ->where('product_id', $product_id)
            ->where('status', 1)
            ->first();

        if ($existingRecord) {
            return back()->with('msgdan', 'Sorry, this product is already in your Card.');
        }
        AddToCadfav::create([
            'user_id' => auth()->id(),
            'product_id'=>$product_id ,
            'status' =>1,
        ]);
        return back()->with('msg' , 'This Product Add To Card');
    }
    public function addToFav($product_id)
    {
        Product::findOrFail($product_id);
        $existingRecord = AddToCadfav::where('user_id', auth()->id())
            ->where('product_id', $product_id)
            ->where('status', 0)
            ->first();

        if ($existingRecord) {
            return back()->with('msgdan', 'Sorry, this product is already in your favorites.');
        }
        AddToCadfav::create([
            'user_id' => auth()->id(),
            'product_id'=>$product_id ,
            'status' =>0,
        ]);
        return back()->with('msg' , 'This Product Add To favourite ');
    }
    public  function showFavorite(){
        $my=AddToCadfav::where('user_id' , auth()->id())->where('status' , 0)->latest()->get();
       $add=$my->pluck('product_id')->map(function ($productId){
        return Product::findOrFail($productId);
       });
        return view('favorite' ,['favs'=>$add]);
    }
    public  function showCards(){
        $my=AddToCadfav::where('user_id' , auth()->id())->where('status' , 1)->latest()->get();
       $add=$my->pluck('product_id')->map(function ($productId){
        return Product::findOrFail($productId);
       });
        return view('cards-shopping' ,['adds'=>$add]);
    }
    public function destroyFavorite($product_id){
        $check=Product::findOrFail($product_id);
        $destroy=AddToCadfav::where('user_id' , auth()->id())->where('product_id' , $product_id)->where('status' , 0);
        if ($check && $destroy) {
            $destroy->delete();
        }
        return back()->with('msgdan' , 'Item Delete In Your Card');
    }
    public function destroy($product_id){
        $check=Product::findOrFail($product_id);
        $destroy=AddToCadfav::where('user_id' , auth()->id())->where('product_id' , $product_id)->where('status' , 1);
        if ($check && $destroy) {
            $destroy->delete();
        }
        return back()->with('msgdan' , 'Item Delete In Your Card');
    }
}
