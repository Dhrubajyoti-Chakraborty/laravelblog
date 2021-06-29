@extends('layout.app')


@section('content')
<div class="row">
    <div class="col-md-12">
       <h1>Laravel CRUD Ajax</h1>
    </div>
</div>

<div class="row">
    <div class="table table-responsive">
        <table class="table table-bordered" id="table">
           <tr>
             <th width="150px">No</th>
             <th>Title</th>
             <th>Body</th>
             <th>Created_at</th>
             <th class="text-center" width="150px">
                <a href="" class="create-modal btn btn-success btn-sm">
                <i class="glyphicon glyphicon-plus"></i>
                </a>
             </th>
           </tr>
           {{csrf_field()}}
           <?php $no=1; ?>
           @foreach ($post as $key => $value)
             <tr class="post{{$value->id}}">
               <td>{{ $no++ }}</td>
               <td>{{$value->title}}</td>
               <td>{{$value->body}}</td>
               <td>{{$value->created_at}}</td>
               <td>
                   <a href="" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                      <i class="fa fa-eye"></i>
                   </a>
                   <a href="" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                      <i class="fa fa-pencil"></i> 
                   </a>
                   <a href="" class="delete-modal btn btn-danger btn-sm" data-id="{{$value->id}}" data-title="{{$value->title}}" data-body="{{$value->body}}">
                      <i class="fa fa-trash"></i>
                   </a>
               </td>

             </tr>
           @endforeach  
        </table>
    </div>
</div>

<!-- form create post -->

<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" role="form">
                     <div class="form-group row add">
                        <label for="title" class="control-label col-sm-2">Title</label>
                        <div class="col-sm-10">
                            <input type="text" id="title" name="title" placeholder="Your title is here" class="form-control" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="body" class="control-label col-sm-2">Body</label>
                        <div class="col-sm-10">
                            <input type="text" id="body" name="body" placeholder="Your body is here" class="form-control" required>
                            <p class="error text-center alert alert-danger hidden"></p>
                        </div>
                     </div>

                     <div class="modal-footer">
                         <button class="btn btn-warning" type="submit" id="add">
                         <span class="glyphicon glyphicon-plus"></span>Save Post
                         </button>
                         <button class="btn btn-warning" type="button" data-dismiss="modal">
                         <span class="glyphicon glyphicon-remobe"></span>Close
                         </button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection