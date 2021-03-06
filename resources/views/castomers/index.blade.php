@extends('castomers.layout')
@section('content')
<div class="row">
<div class="col-lg-12" style="text-align: center">
<div >
<h2>Laravel 7 CRUD using Bootstrap Modal</h2>
</div>
<br/>
</div>
</div>
<div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-right">
    <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-castomer" data-toggle="modal">New Customer</a>
    </div>
    </div>
    </div>
    <br/>

    <table class="table table-bordered bg-light">
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th width="280px">Action</th>
    </tr>
    <tr id="customer_id_{{-- $customer->id --}}">
    <td>{{-- $customer->id --}}</td>
    <td>{{-- $customer->name --}}</td>
    <td>{{-- $customer->email --}}</td> 
    <td>{{-- $customer->address --}}</td>
    <td>
    <form action="{{-- route('customers.destroy',$customer->id) --}}" method="POST">
    <a class="btn btn-info" id="show-customer" data-toggle="modal" data-id="{{-- $customer->id --}}" >Show</a>
    <a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id="{{-- $customer->id --}}">Edit </a>
    <meta name="csrf-token" content="{{-- csrf_token() --}}">
    <a id="delete-customer" data-id="{{-- $customer->id --}}" class="btn btn-danger delete-user">Delete</a></td>
    </table>
        <!-- Add and Edit customer modal -->
    <div class="modal fade" id="crud-modal" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title" id="castomerCrudModal"></h4>
                </div>
                <div class="modal-body">
                <form name="custForm" action="{{ route('customers.store') }}" method="POST">
                <input type="hidden" name="cust_id" id="cust_id" >
                @csrf
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="address" id="address" class="form-control" placeholder="Address" onchange="validate()" onkeypress="validate()">
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
                <a href="{{ route('castomers.index') }}" class="btn btn-danger">Cancel</a>
                </div>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
error=false

function validate()
{
	if(document.custForm.name.value !='' && document.custForm.email.value !='' && document.custForm.address.value !='')
	    document.custForm.btnsave.disabled=false
	else
		document.custForm.btnsave.disabled=true
}
</script>