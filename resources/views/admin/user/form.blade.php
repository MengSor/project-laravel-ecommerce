@extends('admin.layouts.admin')
@section('content')

@if (!isset( $user))
 <h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Category Form</h1> 
 <form action="{{route('admin.user.add')}}" method="post" enctype="multipart/form-data">  
@else
 <h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Edit Category Form</h1>  
 <form action="{{route('admin.user.update')}}" method="post" enctype="multipart/form-data">  
 <input type="hidden" name="txtssid" value="{{ $user['cid']}}"/>
@endif

<div class="row mt-3">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        
          <!-- title -->
          @csrf
         <div class="form-group">
                 <label for="txttitle" class="form-label">Name</label>
                 <input type="text" class="form-control" value="{{(isset( $user)? $user['cname']:'')}}"  id="txttitle" name="txttitle" >
                 @error('txttitle')
                     <div class="text-danger">Name is Required!</div>
                 @enderror
             <!-- subtitle -->       
           
           <!-- text -->
          <div class="mb-3">
           <label for="tatext" class="form-label">Description</label>
           <textarea class="form-control"  id="tatext" name="tatext" rows="3">{{(isset( $user)? $user['cdesc']:'')}}</textarea>
           </div>
            <!-- link -->
           
           <!-- Enable -->
          
           <!-- images -->
         
           
          <!-- btn add and cancel -->
         <div>
          <input type="submit" class="btn btn-primary" value="{{isset( $user)?'Update Category':'Add category'}}" />
          <a href="/admins/user" class ="btn btn-secondary">Cancel</a>
           </div>
        </form>
       
      
      </div>
    </div>
  </div>
</div><!--End Row-->
@endsection

