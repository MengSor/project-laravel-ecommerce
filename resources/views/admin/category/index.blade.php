@extends('admin.layouts.admin')
@section('content')
<a href="{{route('admin.category.form')}}" class=" btn btn-primary" style="float: right">Add categorys</a>
<h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Category</h1>
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
       @if ($categorys->count() > 0 )      
        <table class="table">
           <tr>
             <th>No</th>
             <th>Category Name</th>
             <th>Description</th>
             <th>Action</th>
            </tr>
            @foreach ($categorys as $category)
            <tr>
             <td>{{ ($categorys->currentPage() - 1) * $categorys->perPage() + $loop->iteration }}</td>
             <td>{{$category->cname}}</td>
             <td>{{$category->cdesc}}</td>

             <td>
             
              <a href="{{route('admin.category.edit',['id'=>$category['cid']])}}">
                <i class="zmdi zmdi-border-color"></i>
              </a>
              <a href="#" data-toggle="modal" data-target="#deleteModalLong{{$category['cid']}}">
                <i class="zmdi zmdi-delete"></i>
              </a>
             </td>
           </tr>   
           <!-- Modal -->
           <div class="modal fade" id="deleteModalLong{{$category['cid']}}" tabindex="1" role="dialog" aria-labelledby="deleteModalLongTitle" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLongTitle" style="color:black">Confirmation!</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                  <p style="color:black">Are you sur you wish to delete this  $category ?</p>
                </div>
                <div class="modal-footer">         
                 <a  href="{{route('admin.category.delete', ['id'=>$category['cid'], 'page'=>$categorys->currentPage()])}}" class="btn btn-primary">Yes</a>
                 <a  class="btn btn-secondary" data-dismiss="modal">No</a>
                </div>
               </div>
              </div>
            </div>
          <!--  Modal -->
          @endforeach
       </table>
       @if ($categorys->lastPage() > 1)
        <div class="d-flex">
          <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="{{$categorys->previousPageUrl()}}">
              Previous
            </a>
            </li>
            @for($i=1;$i<=$categorys->lastPage();$i++)
             <!-- a tag for another page -->
              <li class="page-item {{$categorys->currentPage() == $i ? 'active': ''}}"><a class="page-link" href="{{$categorys->url($i)}}">{{$i}}</a>
            </li>
             @endfor
               <li class="page-item"><a class="page-link" href="{{$categorys->nextPageUrl()}}">
             Next
             </a>
             </li>
          </ul>
          <div>
         @endif  
         @else
          <div class="d-flex justify-content-center">No  $category </div>
        @endif
      </div>
    </div>
  </div>
</div><!--End Row-->


@endsection

