@extends('admin.layouts.admin')
@section('content')

@if (!isset($product))
 <h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Product Form</h1> 
 <form action="{{route('admin.product.add')}}" method="post" enctype="multipart/form-data">  
@else
 <h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Edit Product Form</h1>  
 <form action="{{route('admin.product.update')}}" method="post" enctype="multipart/form-data">  
 <input type="hidden" name="txtssid" value="{{$product['pid']}}"/>
@endif

<div class="row mt-3">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        
          <!-- title -->
          @csrf
         <div class="form-group">
                 <label for="txttitle" class="form-label">Name</label>
                 <input type="text" class="form-control" value="{{(isset($product)?$product['pname']:'')}}"  id="txttitle" name="txttitle" >
                 @error('txttitle')
                     <div class="text-danger">Name is Required!</div>
                 @enderror
             <!-- subtitle -->       
             <div class="mb-3">
              <label for="txtsubtitle" class="form-label">Description</label>
              <textarea class="form-control"  id="txtsubtitle" name="txtsubtitle" rows="3">{{(isset($product)?$product['pdesc']:'')}}</textarea>
           
            </div>
           <!-- text -->
          
           <div class="mb-3">
            <label for="tatext" class="form-label">Price</label>
            <input type="text" class="form-control" value="{{(isset($product)?$product['pprice']:'')}}" id="tatext" name="tatext">
            @error('tatext')
            <div class="text-danger">Price is Required!</div>
            @enderror
          </div>
            <!-- link -->
           <div class="mb-3">
           <label for="txtlink" class="form-label">quantity</label>
           <input type="text" class="form-control" value="{{(isset($product)?$product['quantity']:'')}}" id="txtlink" name="txtlink">
          </div>
          <div>
            <label class="form-label">Select Category</label>
           <select class="form-control mb-3" id="category" name="category">
            <option value="" selected="">Select Category here</option>
            @foreach ($category as $categorys)
             <option value="{{$categorys->cname}}">{{$categorys->cname}}</option>   
            @endforeach
            </select>
          </div>
           <!-- Enable -->
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="chkenable" name="chkenable" {{(isset($product)?($product['enable']=='1'?'checked':''):'checked')}}>
            <label class="custom-control-label" for="chkenable" style="color: rgb(240, 236, 23)">Enable</label>
          </div>
           <!-- images -->
         <div class=" form-group">
           <label for="fileimg">Select a product image to upload</label>
           <input type="file" class="form-control-file" id="fileimg" name="fileimg"  accept="image/png, image/gif, image/jpeg" >
         </div>
           @if (isset($product))
           <div>
            <img src={{URL::asset("img/product/thumbnail/" .$product["pimg"])}} class="img-thumbnail">
            <p>{{$product["pimg"]}}</p>
           </div>
           @endif
          
          <!-- btn add and cancel -->
         <div>
          <input type="submit" class="btn btn-primary" value="{{isset($product)?'Update product':'Add product'}}" />
          <a href="/admins/product" class ="btn btn-secondary">Cancel</a>
           </div>
        </form>
       
      
      </div>
    </div>
  </div>
</div><!--End Row-->
@endsection

