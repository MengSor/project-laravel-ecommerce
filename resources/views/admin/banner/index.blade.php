@extends('admin.layouts.admin')
@section('content')
<a href="{{route('admin.banner.form')}}" class=" btn btn-primary" style="float: right">Add Banners</a>
<h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Banner</h1>
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
       @if ($banners->count() > 0 )      
        <table class="table">
           <tr>
             <th>No</th>
             <th>Images</th>
             <th>Title</th>
             <th>Subtitle</th>
             <th>Text</th>
             <th>Link</th>
             <th>Action</th>
            </tr>
            @foreach ($banners as $banner)
            <tr>
             <td>{{ ($banners->currentPage() - 1) * $banners->perPage() + $loop->iteration }}</td>
             <td><img src={{URL::asset("img/banner/thumbnail/" .$banner["img"])}}></td>
             <td>{{$banner->title}}</td>
             <td>{{$banner->subtitle}}</td>
             <td>{{$banner->text}}</td>
             <td>{{$banner->link}}</td>
             <td>
              <a href="{{route('admin.banner.enbledisable', ['id'=>$banner['ssid'],'page'=>$banners->currentPage(), 'action'=>$banner['enable']])}}">
                <i class="zmdi zmdi-{{$banner['enable']==1 ? 'eye':'eye-off'}}"></i>
               </a>
               <a href="{{route('admin.banner.moveupdown', ['id'=>$banner['ssid'], 'action'=>'1','page'=>$banners->currentPage()])}}">
                  <i class="zmdi zmdi-long-arrow-up"></i>
              </a>
              <a href="{{route('admin.banner.moveupdown', ['id'=>$banner['ssid'], 'action'=>'0','page'=>$banners->currentPage()])}}">
                <i class="zmdi zmdi-long-arrow-down"></i>
              </a>
             
              <a href="{{route('admin.banner.edit',['id'=>$banner['ssid']])}}">
                <i class="zmdi zmdi-edit"></i>
              </a>
              <a href="#" data-toggle="modal" data-target="#deleteModalLong{{$banner['ssid']}}">
                <i class="zmdi zmdi-delete"></i>
              </a>
             </td>
           </tr>   
           <!-- Modal -->
           <div class="modal fade" id="deleteModalLong{{$banner['ssid']}}" tabindex="1" role="dialog" aria-labelledby="deleteModalLongTitle" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                   <h4 class="modal-title" id="exampleModalLongTitle" style="color:black">Confirmation!</h4>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <div class="modal-body">
                  <p style="color:black">Are you sur you wish to delete this banner ?</p>
                </div>
                <div class="modal-footer">         
                 <a  href="{{route('admin.banner.delete', ['id'=>$banner['ssid'], 'page'=>$banners->currentPage()])}}" class="btn btn-primary">Yes</a>
                 <a  class="btn btn-secondary" data-dismiss="modal">No</a>
                </div>
               </div>
              </div>
            </div>
          <!--  Modal -->
          @endforeach
       </table>
       @if ($banners->lastPage() > 1)
        <div class="d-flex">
          <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="{{$banners->previousPageUrl()}}">
              Previous
            </a>
            </li>
            @for($i=1;$i<=$banners->lastPage();$i++)
             <!-- a tag for another page -->
              <li class="page-item {{$banners->currentPage() == $i ? 'active': ''}}"><a class="page-link" href="{{$banners->url($i)}}">{{$i}}</a>
            </li>
             @endfor
               <li class="page-item"><a class="page-link" href="{{$banners->nextPageUrl()}}">
             Next
             </a>
             </li>
          </ul>
          <div>
         @endif  
         @else
          <div class="d-flex justify-content-center">No Banner </div>
        @endif
      </div>
    </div>
  </div>
</div><!--End Row-->


@endsection

