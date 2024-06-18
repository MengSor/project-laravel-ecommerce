@extends('admin.layouts.admin')
@section('content')

@if (!isset($banner))
 <h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Banner Form</h1> 
 <form action="{{route('admin.banner.add')}}" method="post" enctype="multipart/form-data">  
@else
 <h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Edit Banner Form</h1>  
 <form action="{{route('admin.banner.update')}}" method="post" enctype="multipart/form-data">  
 <input type="hidden" name="txtssid" value="{{$banner['ssid']}}"/>
@endif

<div class="row mt-3">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        
          <!-- title -->
          @csrf
         <div class="form-group">
                 <label for="txttitle" class="form-label">Title</label>
                 <input type="text" class="form-control" value="{{(isset($banner)?$banner['title']:'')}}"  id="txttitle" name="txttitle" >
                 @error('txttitle')
                     <div class="text-danger">Title is Required!</div>
                 @enderror
             <!-- subtitle -->       
           <div class="mb-3">
           <label for="txtsubtitle" class="form-label">Subtitle</label>
           <input type="text" class="form-control" value="{{(isset($banner)?$banner['subtitle']:'')}}" id="txtsubtitle" name="txtsubtitle">
           @error('txtsubtitle')
           <div class="text-danger">Subtitle is Required!</div>
           @enderror
          </div>
           <!-- text -->
          <div class="mb-3">
           <label for="tatext" class="form-label">Text</label>
           <textarea class="form-control"  id="tatext" name="tatext" rows="3">{{(isset($banner)?$banner['text']:'')}}</textarea>
           </div>
            <!-- link -->
           <div class="mb-3">
           <label for="txtlink" class="form-label">Link</label>
           <input type="text" class="form-control" value="{{(isset($banner)?$banner['link']:'')}}" id="txtlink" name="txtlink">
          </div>
           <!-- Enable -->
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="chkenable" name="chkenable" {{(isset($banner)?($banner['enable']=='1'?'checked':''):'checked')}}>
            <label class="custom-control-label" for="chkenable" style="color: rgb(240, 236, 23)">Enable</label>
          </div>
           <!-- images -->
         <div class=" form-group">
           <label for="fileimg">Select a banner image to upload</label>
           <input type="file" class="form-control-file" id="fileimg" name="fileimg"  accept="image/png, image/gif, image/jpeg" >
         </div>
           @if (isset($banner))
           <div>
            <img src={{URL::asset("img/banner/thumbnail/" .$banner["img"])}} class="img-thumbnail">
            <p>{{$banner["img"]}}</p>
           </div>
           @endif
          <!-- btn add and cancel -->
         <div>
          <input type="submit" class="btn btn-primary" value="{{isset($banner)?'Update Banner':'Add banner'}}" />
          <a href="/admins/banner" class ="btn btn-secondary">Cancel</a>
           </div>
        </form>
       
      
      </div>
    </div>
  </div>
</div><!--End Row-->
@endsection

