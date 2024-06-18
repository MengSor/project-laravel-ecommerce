<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;
use Image;
class BannerController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    function listAll()
    {
      $banners =  Banner::orderBy('ssorder','asc')->paginate(5);
      return view('admin.banner.index' , compact('banners'));
    }
    //function Enable and disable
    function enableDisable(Request $request,String $id, String $action)
    {
      $banners =  Banner::find($id);
      $banners->enable =($action == '1'? 0 : 1);
      $banners->save();
      $banners =  Banner::orderBy('ssorder','asc')->paginate(10);
      return redirect()->route('admin.banner',['page'=>$request->page]);
    }
    //function Move up Down
    function moveUpdown(Request $request,String $id, String $action)
    {
         $banner = Banner::find($id);
         $upperBanner = null;
           if($action == "1")
           {
            $upperBanner = Banner::where('ssorder', '<',$banner->ssorder)->orderBy('ssorder','desc')->first();
             if($upperBanner != null)
             {         
              $tmp = $banner->ssorder;
              $banner->ssorder = $upperBanner->ssorder;
              $upperBanner->ssorder = $tmp;
              $banner->save();
              $upperBanner->save();
             }
           }
          else{
            $upperBanner = Banner::where('ssorder', '>',$banner->ssorder)->orderBy('ssorder','asc')->first();
            if($upperBanner != null)
             {
              $tmp = $banner->ssorder;
              $banner->ssorder = $upperBanner->ssorder;
              $upperBanner->ssorder = $tmp;
              $banner->save();
             $upperBanner->save();
             }
          }
      return redirect()->route('admin.banner',['page'=>$request->page]);
    }
    //function delete
    function Delete(Request $request ,String $id)
    {
      $banner = Banner::find($id);
      if($banner != null)
      {
        $banner->delete();
        $iname = $banner['img'];
        $image =  public_path() . '/img/banner/' . $iname;
        $thumbnail = public_path() . '/img/banner/thumbnail/' . $iname;
        if(file_exists($image))
        {
          unlink($image);
        }
        if(file_exists($thumbnail))
        {
          unlink($thumbnail);
        }
        return redirect()->route('admin.banner',['page'=>$request->page])->with("success", "A Banner has been daleted successfully!!");
      }
      else
      {
        return redirect()->route('admin.banner',['page'=>$request->page])->with("fail", "Banner not found!!");
      }
    }
    //Function Forom
    function form()
    {
      return view('admin.banner.form');
    }
    //function Add
    function add(Request $request)
   {
     $validate = Validator::make($request->all(), [
        'txttitle' => 'required',
        'txtsubtitle' => 'required',
    ]);
    if($validate->fails())
    {
      return back()->withErrors($validate->errors())->withInput();
    }
    else{
     $banner = new Banner();
     $banner->title = $request->txttitle;
     $banner->subtitle = $request->txtsubtitle;
     $banner->text = $request->tatext;
     $banner->link = $request->txtlink;
     $banner->enable = "0";
     $banner->ssorder = Banner::orderby("ssorder", "desc")->pluck('ssorder')->first()+1;
    if($request->has('chkenable'))
    {
      $banner->enable = "1";   
    } 
    //name
     $ext = $request->file('fileimg')->getClientOriginalExtension();
     $iname = time() .".". $ext;
     $pathname = public_path('img/banner');
    //Thumbnail
    $image = Image::make($request->file('fileimg'));
    $image->resize(50,50);
    $image->save($pathname . "/thumbnail/" . $iname);
     //Upload img
     $request->file('fileimg')->move( $pathname, $iname);
     $banner->img = $iname;
     $banner->save();
     return redirect('/admins/banner');
    }
   }   
   //function edit
   function edit(String $id)
   {
    $banner =Banner::find($id);
    return view('admin.banner.form' , compact('banner'));
   }
   //function update
   function update(Request $request)
   {
      $id = $request->txtssid;
      $banner = Banner::find($id);
    if($banner)
    {
      $banner->title = $request->txttitle;
      $banner->subtitle = $request->txtsubtitle;
      $banner->text = $request->tatext;
      $banner->link = $request->txtlink;
      $banner->enable = 0;
      if(isset($request->chkenable))
      {
        $banner->enable = 1;
      }
      if($request->hasFile('fileimg'))
      {
         //name
       $ext = $request->file('fileimg')->getClientOriginalExtension();
       $iname = time() .".". $ext;
       $pathname = public_path('img/banner');
        //Thumbnail
       $image = Image::make($request->file('fileimg'));
       $image->resize(50,50);
       $image->save($pathname . "/thumbnail/" . $iname);
       //Upload img
       $request->file('fileimg')->move( $pathname, $iname);
       //delete old img
       $oldimg = $banner->img;
       unlink($pathname . "/thumbnail/" . $oldimg);
       unlink($pathname . "/" . $oldimg);
        
       $banner->img = $iname;
      }
      $banner->save();
    }
      return redirect('/admins/banner');
   }
}
