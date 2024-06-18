<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Category;
use Image;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
      function Listall()
      {
       
        $products =  Product::orderBy('cid','asc')->paginate(5);
        return view('admin.product.index' , compact('products'));
      }
      //function Enable and disable
      function enableDisable(Request $request,String $id, String $action)
      {
        $products =  Product::find($id);
        $products->enable =($action == '1'? 0 : 1);
        $products->save();
        $products =  Product::orderBy('cid','asc')->paginate(10);
        return redirect()->route('admin.product',['page'=>$request->page]);
      }
      //function Move up Down
      function moveUpdown(Request $request,String $id, String $action)
      {
           $product =Product::find($id);
           $upperproduct = null;
             if($action == "1")
             {
              $upperproduct =Product::where('cid', '<',$product->cid)->orderBy('cid','desc')->first();
               if($upperproduct != null)
               {         
                $tmp = $product->cid;
                $product->cid = $upperproduct->cid;
                $upperproduct->cid = $tmp;
                $product->save();
                $upperproduct->save();
               }
             }
            else{
              $upperproduct =Product::where('cid', '>',$product->cid)->orderBy('cid','asc')->first();
              if($upperproduct != null)
               {
                $tmp = $product->cid;
                $product->cid = $upperproduct->cid;
                $upperproduct->cid = $tmp;
                $product->save();
               $upperproduct->save();
               }
            }
        return redirect()->route('admin.product',['page'=>$request->page]);
      }
      //function delete
      function Delete(Request $request ,String $id)
      {
        $product =Product::find($id);
        if($product != null)
        {
          $product->delete();
          $iname = $product['pimg'];
          $image =  public_path() . '/img/product/' . $iname;
          $thumbnail = public_path() . '/img/product/thumbnail/' . $iname;
          if(file_exists($image))
          {
            unlink($image);
          }
          if(file_exists($thumbnail))
          {
            unlink($thumbnail);
          }
          return redirect()->route('admin.product',['page'=>$request->page])->with("success", "AProduct has been daleted successfully!!");
        }
        else
        {
          return redirect()->route('admin.product',['page'=>$request->page])->with("fail", "Product not found!!");
        }
      }
      //Function Forom
      function form()
      {
        $category = Category::all();
        return view('admin.product.form', compact('category'));
      }
      //function Add
      function add(Request $request)
     {
       $validate = Validator::make($request->all(), [
          'txttitle' => 'required',
          'tatext' => 'required',
      ]);
      if($validate->fails())
      {
        return back()->withErrors($validate->errors())->withInput();
      }
      else{
       $product = new Product();
       $product->pname = $request->txttitle;
       $product->pdesc = $request->txtsubtitle;
       $product->pprice = $request->tatext;
       $product->quantity = $request->txtlink;
       $product->cateogry = $request->category;
       $product->enable = "0";
       $product->cid =Product::orderby("cid", "desc")->pluck('cid')->first()+1;
      if($request->has('chkenable'))
      {
        $product->enable = "1";   
      } 
      //name
       $ext = $request->file('fileimg')->getClientOriginalExtension();
       $iname = time() .".". $ext;
       $pathname = public_path('img/product');
      //Thumbnail
      $image = Image::make($request->file('fileimg'));
      $image->resize(50,50);
      $image->save($pathname . "/thumbnail/" . $iname);
       //Upload img
       $request->file('fileimg')->move( $pathname, $iname);
       $product->pimg = $iname;
       $product->save();
       return redirect('/admins/product');
      }
     }   
     //function edit
     function edit(String $id)
     {
      $category = Category::all();
      $product =Product::find($id);
      return view('admin.product.form' , compact('product','category'));
     }
     //function update
     function update(Request $request)
     {
    
        $id = $request->txtssid;
        $product =Product::find($id);
      if($product)
      {
        $product->pname = $request->txttitle;
        $product->pdesc = $request->txtsubtitle;
        $product->pprice = $request->tatext;
        $product->quantity = $request->txtlink;
        $product->cateogry = $request->category;
        $product->enable = 0;
        if(isset($request->chkenable))
        {
          $product->enable = 1;
        }
        if($request->hasFile('fileimg'))
        {
           //name
         $ext = $request->file('fileimg')->getClientOriginalExtension();
         $iname = time() .".". $ext;
         $pathname = public_path('img/product');
          //Thumbnail
         $image = Image::make($request->file('fileimg'));
         $image->resize(50,50);
         $image->save($pathname . "/thumbnail/" . $iname);
         //Upload img
         $request->file('fileimg')->move( $pathname, $iname);
         //delete old img
         $oldimg = $product->pimg;
         unlink($pathname . "/thumbnail/" . $oldimg);
         unlink($pathname . "/" . $oldimg);
          
         $product->pimg = $iname;
        }
        $product->save();
      }
        
        return redirect('/admins/product');
     }
}
