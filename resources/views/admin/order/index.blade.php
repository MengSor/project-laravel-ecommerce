@extends('admin.layouts.admin')
@section('content')
<h1 class="h4 mb-3 float-start" ><strong>Pages</strong> Order</h1>




<div class="row mt-3">  
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
       @if ($carts->count() > 0 )      
        <table class="table">
           <tr>
             <th>No.</th>
             <th>Name</th>
             <th>Price</th>
             <th>Quantity</th>
             <th>User Name</th>
             <th>Email</th>
             <th>Order Date</th>
             <th>Action</th>
            </tr>
            
               @foreach ($carts as $cart)
            <tr>
             <td>{{$cart->id}}</td>
           
             <td>{{$cart->product->pname}}</td>
             <td>${{$cart->product->pprice}}.00</td>
             <td>{{$cart->product->quantity}}</td>
             <td>{{$cart->user->name}}</td>
             <td>{{$cart->user->email}}</td>
             <td>{{$cart->created_at}}</td>
             <td> 
              <a href="#"">
                <i class="zmdi zmdi-truck"></i>
              </a>
              <a href="#" data-toggle="modal" data-target="#deleteModalLong{{$cart['id']}}">
                <i class="zmdi zmdi-delete"></i>
              </a>
             </td>
           </tr>  
           @endforeach 
           <!--
           <!-- Modal 
           <div class="modal fade" id="deleteModalLong{$user['id']}}" tabindex="1" role="dialog" aria-labelledby="deleteModalLongTitle" aria-hidden="true">
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
                 <a  href="{route('admin.user.delete', ['id'=>$user['id'], 'page'=>$cart->currentPage()])}}" class="btn btn-primary">Yes</a>
                 <a  class="btn btn-secondary" data-dismiss="modal">No</a>
                </div>
               </div>
              </div>
            </div>
          <!--  Modal -->
        
       </table>
        
         @else
          <div class="d-flex justify-content-center">No  user </div>
        @endif
      </div>
    </div>
  </div>
</div><!--End Row-->


@endsection

