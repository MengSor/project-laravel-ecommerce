<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Banner;
use Image;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
      function userListAll()
      {
        $users =  User::orderBy('id','asc')->paginate(10);
        return view('admin.user.index' , compact('users'));
      }
      //function Enable and disable
      function enableDisable(Request $request,String $id, String $action)
      {
       $users =  User::find($id);
       $users->is_admin =($action == '1'? 0 : 1);
       $users->save();
       $users =  User::orderBy('id','asc')->paginate(10);
        return redirect()->route('admin.user',['page'=>$request->page]);
      }
      //function Move up Down
      /*function moveUpdown(Request $request,String $id, String $action)
      {
           $user = User::find($id);
           $upperUser = null;
             if($action == "1")
             {
              $upperUser = User::where('cid', '<', $user->cid)->orderBy('cid','desc')->first();
               if($upperUser != null)
               {         
                $tmp =  $user->cid;
                 $user->cid = $upperUser->cid;
                $upperUser->cid = $tmp;
                 $user->save();
                $upperUser->save();
               }
             }
            else{
              $upperUser = User::where('cid', '>', $user->cid)->orderBy('cid','asc')->first();
              if($upperUser != null)
               {
                $tmp =  $user->cid;
                 $user->cid = $upperUser->cid;
                $upperUser->cid = $tmp;
                 $user->save();
               $upperUser->save();
               }
            }
        return redirect()->route('admin.User',['page'=>$request->page]);
      }*/
      //function delete
      function Delete(Request $request ,String $id)
      {
         $user = User::find($id);
        if( $user != null)
        {
           $user->delete();
          return redirect()->route('admin.user',['page'=>$request->page])->with("success", "A User has been daleted successfully!!");
        }
        else
        {
          return redirect()->route('admin.user',['page'=>$request->page])->with("fail", "User not found!!");
        }
      }
      //Function Forom
      function form()
      {
        return view('admin.user.form');
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
        $user = new User();
        $user->cname = $request->txttitle;
        $user->cdesc = $request->tatext;
        $user->cid = User::orderby("cid", "desc")->pluck('cid')->first()+1;
    
      
       
      $user->save();
       return redirect('/admins/user');
      }
     }   
    
     //function update
     function update(Request $request)
     {
        $id = $request->txtssid;
         $user = User::find($id);
      if( $user)
      {
         $user->cname = $request->txttitle;
         $user->cdesc = $request->tatext;
        
         
        
         $user->save();
      }
        return redirect('/admins/user');
     }
}

