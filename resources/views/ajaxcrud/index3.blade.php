<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel 5.8 Ajax CRUD Application - 
DevOpsSchool.com </title>
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
    <div class="col-12">
        <div class="row">
            <a href="javascript:void(0);" class="btn btn-success mb-5" id="create-new-post">ADD NEW POST</a>
            <table class="table table-bordered" id="laravel_crud">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody id="posts-crud">
                @foreach($posts as $post)
                    <tr id="post_id_{{$post->id}}">
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

$('body').ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#create-new-post').click(function () {
        $('#postForm').trigger('reset')
        $('#postCrudModal').html('Create new post')
        $('#btn-save').val('create-post')
        $('#ajax-crud-modal').modal('show')
    })
    $('body').on('click','#edit-post',function () {
        var post_id = $(this).data('id')
        $.get('ajax-posts/'+post_id+'/edit',function (data) {
            $('#postForm').trigger('reset')
            $('#postCrudModal').html('Edit post')
            $('#btn-save').val('edit-post')
            $('#ajax-crud-modal').modal('show')
            $('#post_id_'+data.id).val(data.id)
            $('#title').val(data.title)
            $('#body').val(data.body)
        })
    })
    $('body').on('click','#delete-post',function () {
        var post_id = $(this).data('id')
        // confirm("Are you sure to delete?")
        var msj='Are you sure that you want to delete this comment?';
        if (!confirm(msj)) { 
            return false;
        } else {
            
        $.ajax({
            url: 'ajax-posts'+'/'+post_id,
            type: 'DELETE',
            success: function (data) {
                $('#post_id_'+post_id).remove()
            },
            error: function (data) {
                console.log("Error :",data)
            }
        })
       }

    })
})


if($('#postForm').length>0){
    $('#postForm').validate({

        submitHandler: function (form) {
            var actionType = $('#btn-save').val()
            $('#btn-save').html('sending..')
            
            $.ajax({
                url: "{{route('ajax-posts.store')}}",
                data: $('#postForm').serialize(),
                type: 'POST',
                dataType: 'json',
                success: function (data) {
                    var post = '<tr id="'+data.id+'"><td>'+data.id+'</td><td>'+data.title+'</td><td>'+data.body+'</td>';
                        post += '<td><a href="javascript:void(0);" class="btn btn-info" id="edit-post" data-id="'+data.id+'">EDIT</a></td>';
                        post +=  '<td><a href="javascript:void(0);" class="btn btn-danger delete-post" id="delete-post" data-id="'+data.id+'">DELETE</a></td>';   
                    
                    if (actionType == 'create-post') {
                        $('#posts-crud').prepend(post)
                    } else {
                        $('#post_id_'+data.id).replaceWith(post)
                    }

                    $('#postForm').trigger('reset')
                    $('#ajax-crud-modal').modal('hide')
                    $('#btn-save').html('save changes')
                },
                error: function (data) {
                    console.log("Error :", data)
                }
            })
        }
    })
}









</script>








<script>
// $('body').ready(function () {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $('#create-new-post').click(function () {
//         $('#postCrudModal').html('Create new post')
//         $('#postForm').trigger('reset')
//         $('#btn-save').val('create-post')
//         $('#ajax-crud-modal').modal('show')
//     })

//     $('body').on('click','#edit-post',function (data) {
//         var post_id = $(this).data('id')
//         $.get('ajax-posts/'+post_id+'/edit', function (data) {
//             $('#postCrudModal').html('Edit post')
//             $('#postForm').trigger('reset')
//             $('#btn-save').val('edit-post')
//             $('#ajax-crud-modal').modal('show')
//             $('#post_id_'+data.id).val(data.id)
//             $('#title').val(data.title)
//             $('#body').val(data.body)
//         })
//     })

//     $('body').on('click','#delete-post',function (data) {
//         var post_id = $(this).data('id')
        
//         $.ajax({
//             url: "{{url('ajax-posts')}}"+'/'+post_id,
//             type: "DELETE",
//             success: function (data) {
//                 $('#post_id_'+post_id).remove()
//             },
//             error: function (data) {
//                 console.log("Error :",data)
//             }
//         })
//     })
// })


// if($('#postForm').length > 0){
//     $('#postForm').validate({
//         submitHandler: function(form){
//             var actionType = $('#btn-save').val()
//             $('#btn-save').html('sending..')

//             $.ajax({
//                 data: $('#postForm').serialize(),
//                 type: 'POST',
//                 dataType: 'json',
//                 url: "{{route('ajax-posts.store')}}",
//                 success: function (data) {
//                     var post = '<tr id="post_id_'+data.id+'"><td>'+data.id+'</td><td>'+data.title+'</td><td>'+data.body+'</td>';
//                         post += '<td><a href="javascript:void(0);" class="btn btn-info" id="edit-post" data-id="'+data.id+'">EDIT</a></td>';
//                         post += '<td><a href="javascript:void(0);" class="btn btn-danger delete-post" id="delete-post" data-id="'+data.id+'">DELETE</a></td>';

//                         if(actionType == 'create-post'){
//                             $('#posts-crud').prepend(post)
//                         }else{
//                             $('#post_id_'+data.id).replaceWith(post)
//                         }

//                         $('#postForm').trigger('reset')
//                         $('#ajax-crud-modal').modal('hide')
//                         $('#btn-save').html('save changes')
//                 }
//             })
//         }
//     })
// }


</script>

