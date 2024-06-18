<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Banner;
use Image;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
      function ListAll()
      {
        $categorys =  Category::orderBy('cid','asc')->paginate(10);
        return view('admin.category.index' , compact('categorys'));
      }
      //function Enable and disable
      
      //function Move up Down
      /*function moveUpdown(Request $request,String $id, String $action)
      {
           $category = Category::find($id);
           $upperCategory = null;
             if($action == "1")
             {
              $upperCategory = Category::where('cid', '<', $category->cid)->orderBy('cid','desc')->first();
               if($upperCategory != null)
               {         
                $tmp =  $category->cid;
                 $category->cid = $upperCategory->cid;
                $upperCategory->cid = $tmp;
                 $category->save();
                $upperCategory->save();
               }
             }
            else{
              $upperCategory = Category::where('cid', '>', $category->cid)->orderBy('cid','asc')->first();
              if($upperCategory != null)
               {
                $tmp =  $category->cid;
                 $category->cid = $upperCategory->cid;
                $upperCategory->cid = $tmp;
                 $category->save();
               $upperCategory->save();
               }
            }
        return redirect()->route('admin.category',['page'=>$request->page]);
      }*/
      //function delete
      function Delete(Request $request ,String $id)
      {
         $category = Category::find($id);
        if( $category != null)
        {
           $category->delete();
          return redirect()->route('admin.category',['page'=>$request->page])->with("success", "A Category has been daleted successfully!!");
        }
        else
        {
          return redirect()->route('admin.category',['page'=>$request->page])->with("fail", "Category not found!!");
        }
      }
      //Function Forom
      function form()
      {
        return view('admin.category.form');
      }
      //function Add
      function add(Request $request)
     {
       $validate = Validator::make($request->all(), [
          'txttitle' => 'required',
         
      ]);
      if($validate->fails())
      {
        return back()->withErrors($validate->errors())->withInput();
      }
      else{
        $category = new Category();
        $category->cname = $request->txttitle;
        $category->cdesc = $request->tatext;
        $category->cid = Category::orderby("cid", "desc")->pluck('cid')->first()+1;
    
      
       
      $category->save();
       return redirect('/admins/category');
      }
     }   
     //function edit
     function edit(String $id)
     {
       $category =Category::find($id);
      return view('admin.Category.form' , compact('category'));
     }
     //function update
     function update(Request $request)
     {
        $id = $request->txtssid;
         $category = Category::find($id);
      if( $category)
      {
         $category->cname = $request->txttitle;
         $category->cdesc = $request->tatext;
        
         
        
         $category->save();
      }
        return redirect('/admins/category');
     }
}
