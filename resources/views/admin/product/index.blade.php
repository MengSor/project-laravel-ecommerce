@extends('admin.layouts.admin')
@section('content')
<a href="{{route('admin.product.form')}}" class=" btn btn-primary" style="float: right">Add Product</a>
<h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Product</h1>
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{session('success')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
</div>
@endif
@if (session('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
 {{session('fail')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
</div>
@endif



<div class="row mt-3">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
       @if ($products->count() > 0 )      
        <table class="table">
           <tr>
             <th>No</th>
             <th>Images</th>
             <th>Name</th>
             <th>Description</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>Category</th>
             <th>Action</th>
            </tr>
            @foreach ($products as $product)
            <tr>
             <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
             <td><img src={{URL::asset("img/product/thumbnail/" .$product["pimg"])}}></td>
             <td>{{$product->pname}}</td>
             <td>{{$product->pdesc}}</td>
             <td>${{$product->pprice}}</td>
             <td>{{$product->quantity}}</td>
             <td>{{$product->cateogry}}</td>
             <td>
              <a href="{{route('admin.product.enbledisable', ['id'=>$product['pid'],'page'=>$products->currentPage(), 'action'=>$product['enable']])}}">
                <i class="zmdi zmdi-{{$product['enable']==1 ? 'eye':'eye-off'}}"></i>
               </a>
               <a href="{{route('admin.product.moveupdown', ['id'=>$product['pid'], 'action'=>'1','page'=>$products->currentPage()])}}">
                  <i class="zmdi zmdi-long-arrow-up"></i>
              </a>
              <a href="{{route('admin.product.moveupdown', ['id'=>$product['pid'], 'action'=>'0','page'=>$products->currentPage()])}}">
                <i class="zmdi zmdi-long-arrow-down"></i>
              </a>
             
              <a href="{{route('admin.product.edit',['id'=>$product['pid']])}}">
                <i class="zmdi zmdi-edit"></i>
              </a>
              <a href="#" data-toggle="modal" data-target="#deleteModalLong{{$product['pid']}}">
                <i class="zmdi zmdi-delete"></i>
              </a>
             </td>
           </tr>   
           <!-- Modal -->
           <div class="modal fade" id="deleteModalLong{{$product['pid']}}" tabindex="1" role="dialog" aria-labelledby="deleteModalLongTitle" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLongTitle" style="color:black">Confirmation!</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                  <p style="color:black">Are you sur you wish to delete this product ?</p>
                </div>
                <div class="modal-footer">         
                 <a  href="{{route('admin.product.delete', ['id'=>$product['pid'], 'page'=>$products->currentPage()])}}" class="btn btn-primary">Yes</a>
                 <a  class="btn btn-secondary" data-dismiss="modal">No</a>
                </div>
               </div>
              </div>
            </div>
          <!--  Modal -->
          @endforeach
       </table>
       @if ($products->lastPage() > 1)
        <div class="d-flex">
          <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="{{$products->previousPageUrl()}}">
              Previous
            </a>
            </li>
            @for($i=1;$i<=$products->lastPage();$i++)
             <!-- a tag for another page -->
              <li class="page-item {{$products->currentPage() == $i ? 'active': ''}}"><a class="page-link" href="{{$products->url($i)}}">{{$i}}</a>
            </li>
             @endfor
               <li class="page-item"><a class="page-link" href="{{$products->nextPageUrl()}}">
             Next
             </a>
             </li>
          </ul>
          <div>
         @endif  
         @else
          <div class="d-flex justify-content-center">No product </div>
        @endif
      </div>
    </div>
  </div>
</div><!--End Row-->


@endsection

