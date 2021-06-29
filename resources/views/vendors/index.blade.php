@extends('vendors.layout')
@section('content')


<div class="row">
    <div class="col-lg-12">
        <h1>Laravel 7 CRUD using Bootstrap Modal</h1>
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <a href="javascript:void(0)" class="btn btn-info mb-2" id="new-vendor" data-toggle="modal">Add New Vendor</a>
    </div>
</div>

<br>

<table class="table table-bordered bg-light">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    @foreach ($vendors as $vendor)
  <tr id="vendor_id_{{ $vendor->id }}">
        <td>{{ $vendor->id }}</td>
        <td>{{ $vendor->name }}</td>
        <td>{{ $vendor->email }}</td> 
        <td>{{ $vendor->address }}</td>
          <td>
          <!-- <form action="{{ route('vendors.destroy',$vendor->id) }}" method="POST">
          @csrf
          <a class="btn btn-info" id="show-vendor" data-toggle="modal" data-id="{{ $vendor->id }}" >Show</a>
          <a href="javascript:void(0)" class="btn btn-success" id="edit-vendor" data-toggle="modal" data-id="{{ $vendor->id }}">Edit </a>
          <meta name="csrf-token" content="{{ csrf_token() }}">
          <a id="delete-vendor" data-id="{{ $vendor->id }}" class="btn btn-danger delete-user">Delete</a></td>
          </form> -->

        </td>
    </tr>
@endforeach

</table>




<!-- Add And Edit Customer Modal  -->

<div class="modal fade" tabindex="-1" role="dialog" id="crud-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vendorCrudModal">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
         <form action="{{route('vendors.store')}}" method="post" name="vendForm">

          <input type="hidden" name="vend_id" id="vend_id">
          @csrf

          <div class="col-xs-12 col-md-12 col-sm-12">
              <div class="form-group">
                  <strong>Name</strong>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Name">
              </div>
          </div>
          <div class="col-xs-12 col-md-12 col-sm-12">
              <div class="form-group">
                  <strong>Email</strong>
                  <input type="text" name="email" id="email" class="form-control" placeholder="Email">
              </div>
          </div>
          <div class="col-xs-12 col-md-12 col-sm-12">
              <div class="form-group">
                  <strong>Address</strong>
                  <input type="text" name="address" id="address" class="form-control" placeholder="Address">
              </div>
          </div>
          <div class="col-xs-12 col-md-12 col-sm-12">
              <div class="form-group">
               <button type="submit" class="btn btn-primary" name="btnsave" id="btn-save" disabled>Save changes</button>
               <a href="{{route('vendors.index')}}" class="btn btn-danger">Cancel</a>
              </div>
          </div>

         </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="crud-modal-show">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="customerCrudModal-show">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-xs-2 col-sm-2 col-md-2"></div>
              <div class="col-xs-10 col-sm-10 col-md-10">
                  <table>
                      <tr><td><strong>Name</strong></td><td></td></tr>
                      <tr><td><strong>Email</strong></td><td></td></tr>
                      <tr><td><strong>Address</strong></td><td></td></tr>
                      <tr><td colspan="2" ><a href="" class="btn btn-danger">Ok</a></td></tr>

                  </table>
              </div>

          </div>
      </div>
    </div>
  </div>
</div>





















@endsection