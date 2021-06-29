<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel 5.8 Ajax CRUD Application - 
DevOpsSchool.com </title>

<!-- https://fahmidasclassroom.com/laravel-7-crud-using-bootstrap-modal/ -->
<!-- https://www.devopsschool.com/blog/simple-ajax-crud-application-in-laravel/ -->


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 
 <style>
   .container{
    padding: 0.5%;
   } 
</style>
</head>
<body>
<div class="container">
    <h2 class="alert alert-success mt-5">AJAX LARAVEL CRUD Operation</h2><br>
    <div id="notifDiv"></div>
    <div class="col-12">
        <div class="row">
            <a href="javascript:void(0);" class="btn btn-success mb-5" id="create-new-post">ADD NEW POST</a>
            <a href="javascript:void(0);" class="btn btn-danger mb-5 delete-all" >Delete All</a>
            <table class="table table-bordered" id="laravel_crud">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="check_all"></th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody id="posts-crud">
                @foreach($posts as $post)
                    <tr id="post_id_{{$post->id}}">
                        <td><input type="checkbox" data-id="{{$post->id}}" class="checkbox"></td>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td><a href="javascript:void(0);" class="btn btn-info" id="edit-post" data-id="{{$post->id}}">EDIT</a></td>
                        <td><a href="javascript:void(0);" class="btn btn-danger delete-post" id="delete-post" data-id="{{$post->id}}">DELETE</a></td>
                    </tr>
                @endforeach     
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal default" id="ajax-crud-modal">
    <div class="modal-dialog">
        <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title" id="postCrudModal"></h4>
             </div>
             <div class="modal-body">
                <form action="" class="form-horizontal" name="postForm" id="postForm">
                    <input type="hidden" name="post_id" id="post_id" >
                    <div class="form-group">
                        <label for="" class="col-sm-12">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-12">Body</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="body" id="body">
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save">Save </button>
                    </div>
                </form>
             </div>
             <div class="modal-footer">
             
             </div>
        </div>
    </div>
</div>
</body>
</html>



<script>

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#create-new-post').click(function () {
         $('#postCrudModal').html('create new post')
         $('#postForm').trigger('reset')
         $('#btn-save').val('create-post')
         $('#ajax-crud-modal').modal('show') 
    })   
    $('body').on('click','#edit-post',function () {
         var post_id = $(this).data('id')
         $.get('ajax-posts/'+post_id+'/edit',function (data) {
            $('#postCrudModal').html('Edit post')
            $('#btn-save').val('edit-post')
            $('#ajax-crud-modal').modal('show') 
            $('#post_id').val(data.id)
            $('#title').val(data.title)
            $('#body').val(data.body)
         })         
    }) 
    $('body').on('click','#delete-post',function () {
        var post_id = $(this).data('id')
        if (confirm('Are you sure to delete?')) {
            
            $.ajax({
                url: "{{url('ajax-posts')}}"+'/'+post_id,
                type: 'DELETE',
                success: function (data) {
                    $('#post_id_'+post_id).remove()
                }
            })
        }

    })
})


if($('#postForm').length>0){
    $('#postForm').validate({
        submitHandler:function (form) {
           var actionType = $('#btn-save').val()
           $('#btn-save').html('sending..')

           $.ajax({
               url: "{{route('ajax-posts.store')}}",
               data: $('#postForm').serialize(), 
               type: 'POST',
               dataType: 'json',
               success: function (data) {
                     var post = '<tr id="post_id_'+data.id+'"><td>'+data.id+'</td><td>'+data.title+'</td><td>'+data.body+'</td>';
                      post += '<td><a href="javascript:void(0);" class="btn btn-info" id="edit-post" data-id="'+data.id+'">EDIT</a></td>';
                      post +=  '<td><a href="javascript:void(0);" class="btn btn-danger delete-post" id="delete-post" data-id="'+data.id+'">DELETE</a></td>';                
                     
                     if (actionType=='create-post') {
                          $('#posts-crud').prepend(post)
                     } else {
                          $('#post_id_'+data.id).replaceWith(post)
                     }

                     $('#postForm').trigger('reset')
                     $('#btn-save').html('save changes') 
                     $('#ajax-crud-modal').modal('hide')
               }
           })  
        }
    })
}
   
</script>
<script>
    $('body').ready(function () {
         $('#check_all').on('click',function (e) {
             e.preventDefault()

             if ($(this).is(':checked',true)) {
                 $('.checkbox').prop('checked',true)
             } else {
                $('.checkbox').prop('checked',false)
             }
         })        
         $('.checkbox').on('click',function () {
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true)
            }else{
                $('#check_all').prop('checked',false)
            } 
        })
        $('.delete-all').on('click',function () {
            var idsArr = []
            $('.checkbox:checked').each(function (e) {
                idsArr.push($(this).attr('data-id'))
            })
            if (idsArr.length<=0) {
                alert('Please select atleast one row')
            } else {
                if (confirm('Are you sure to delete selected rows?')) {
                       var strIds = idsArr.join(',')
                       console.log(strIds)
                       $.ajax({
                            url: "{{route('ajax-posts.multiple-delete')}}",
                            data: 'ids'+strIds,
                            headers: 
                            type: 'DELETE',
                            success: function (data) {
                                alert('asdf')
                            } 

                       })
                } 
            }
        })

    })
</script>





















