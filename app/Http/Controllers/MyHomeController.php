<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Cart;

use Image;
class MyHomeController extends Controller
{
    function homepage()
    {
       $bannered = Banner::where('enable', '1')
                           ->orderBy('ssorder')
                           ->get();
       $featuredproducts = Product::where('enable', '1')->get();
       $categories = Category::all();
       //count number
       if(Auth::id()){ 
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
         }
         else
         {
            $count = '';
         }
       return view('home', compact('bannered' , 'featuredproducts','categories','count'));
    }
    function shop()
    {
        $featuredproducts = Product::where('enable', '1')->get();
        $categories = Category::all();
        //count number
        if(Auth::id()){ 
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
             }
             else
             {
                $count = '';
             }
        return view('shop', compact('featuredproducts', 'categories','count'));
    }
    function blog()
    {
        //count number
        if(Auth::id()){ 
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
             }
             else
             {
                $count = '';
             }
        return view('blog', compact('count'));
    }
    function track()
    {
        //count number
        if(Auth::id()){ 
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
             }
             else
             {
                $count = '';
             }
        return view('tracking', compact('count'));
    }
    function contact()
    {
        //count number
        if(Auth::id()){ 
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();
             }
             else
             {
                $count = '';
             }
        return view('contacts', compact('count'));
    }
    function product_details($id)
    {
         //count number
          //count number
       if(Auth::id()){ 
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
         }
         else
         {
            $count = '';
         }
       
        $featuredproducts = Product::find($id);
        return view('product_details', compact('featuredproducts','count'));
    }
   function cart()
   {
       $cartItems = Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
   }
   public function addcart(Request $request)
    {
        
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
        
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart');
    }
    public function add_cart($id){
        $product_id = $id;
        $user =  Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;

        $data->save();
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->back();

    }
    public function mycart(){
       if(Auth::id()){
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        $cart = Cart::where('user_id',$userid)->get();
       }
        return view('mycart' , compact('cart','count'));
    }
}                     
