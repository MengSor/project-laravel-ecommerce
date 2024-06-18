@extends('admin.layouts.admin')
@section('content')
<h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Users</h1>
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
       @if ($users->count() > 0 )      
        <table class="table">
           <tr>
             <th>No.</th>
             <th>User Name</th>
             <th>Email</th>
             <th>Joined</th>
             <th>Action</th>
            </tr>
            @foreach ($users as $user)
            <tr>
             <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
             <td>{{$user->name}}</td>
             <td>{{$user->email}}</td>
             <td>{{$user->created_at}}</td>

             <td> 
              <a href="{{route('admin.user.enbledisable', ['id'=>$user['id'],'page'=>$users->currentPage(), 'action'=>$user['is_admin']])}}">
                <i class="zmdi zmdi-{{$user['is_admin']==1 ? 'eye':'eye-off'}}"></i>
               </a>
              <a href="#" data-toggle="modal" data-target="#deleteModalLong{{$user['id']}}">
                <i class="zmdi zmdi-delete"></i>
              </a>
             </td>
           </tr>   
           <!-- Modal -->
           <div class="modal fade" id="deleteModalLong{{$user['id']}}" tabindex="1" role="dialog" aria-labelledby="deleteModalLongTitle" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLongTitle" style="color:black">Confirmation!</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                  <p style="color:black">Are you sur you wish to delete this  user ?</p>
                </div>
                <div class="modal-footer">         
                 <a  href="{{route('admin.user.delete', ['id'=>$user['id'], 'page'=>$users->currentPage()])}}" class="btn btn-primary">Yes</a>
                 <a  class="btn btn-secondary" data-dismiss="modal">No</a>
                </div>
               </div>
              </div>
            </div>
          <!--  Modal -->
          @endforeach
       </table>
       @if ($users->lastPage() > 1)
        <div class="d-flex">
          <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="{{$users->previousPageUrl()}}">
              Previous
            </a>
            </li>
            @for($i=1;$i<=$users->lastPage();$i++)
             <!-- a tag for another page -->
              <li class="page-item {{$users->currentPage() == $i ? 'active': ''}}"><a class="page-link" href="{{$users->url($i)}}">{{$i}}</a>
            </li>
             @endfor
               <li class="page-item"><a class="page-link" href="{{$users->nextPageUrl()}}">
             Next
             </a>
             </li>
          </ul>
          <div>
         @endif  
         @else
          <div class="d-flex justify-content-center">No  user </div>
        @endif
      </div>
    </div>
  </div>
</div><!--End Row-->


@endsection

