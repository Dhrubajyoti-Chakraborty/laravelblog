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
       <h2 style="margin-top:12px;" class="alert alert-success">AJAX CRUD OPERATION</h2>
       
       <div class="row">
           <div class="col-md-12">
               <a href="" class="btn btn-success mb-2" id="create_new_post">ADD POST</a>
               <table class="table table-bordered laravel_crud">
                     <thead>
                         <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>
                         </tr>
                     </thead>
                     <tbody id="posts_crud">
                     @foreach($posts as $post)
                    <tr id="post_id_{{ $post->id }}">
                        <td>{{ $post->id  }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td><a href="javascript:void(0)" id="edit-post" data-id="{{ $post->id }}" class="btn btn-info">Edit</a></td>
                        <td>
                        <a href="javascript:void(0)" id="delete-post" data-id="{{ $post->id }}" class="btn btn-danger delete-post">Delete</a></td>
                    </tr>
                    @endforeach                   
                     </tbody>
               </table>
           </div>
       </div>
    </div>


<!-- ==============MODAL=============== -->

<div class="modal fade" id="ajax_crud_modal">

   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
             <h4 class="modal-title" id="postCrudModal"></h4>
         </div>
         <div class="modal-body">
            <form action="" class="modal-horizontal" id="postForm" name="postForm">
                 <input type="hidden" name="post_id" id="post_id">
                 <div class="form-group">
                     <label for="title" class="col-md-2 control-label">Name</label>
                     <div class="col-md-12">
                         <input class="form-control" type="text" name="title" id="title" value="" required="">
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="body" class="col-md-2 control-label">Body</label>
                     <div class="col-md-12">
                         <input class="form-control" type="text" name="body" id="body" value="" required="">
                     </div>
                 </div>
                 <div class="col-md-offset-2 col-md-10">
                      <button type="submit" class="btn btn-primary" id="btn_save" value="create">Save</button>  
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
        // e.preventDefault()
        $('#create_new_post').click(function (e) {
        e.preventDefault()

            $('#btn_save').val("create-save");
            $('#postForm').trigger("reset");
            $('#postCrudModal').html("Add new post");
            $('#ajax_crud_modal').modal('show');
        });

        $('body').on('click', '#edit-post', function () {
      var post_id = $(this).data('id');
      $.get('ajax-posts/'+post_id+'/edit', function (data) {
         $('#postCrudModal').html("Edit post");
          $('#btn_save').val("edit-post");
          $('#ajax_crud_modal').modal('show');
          $('#post_id').val(data.id);
          $('#title').val(data.title);
          $('#body').val(data.body);  
      })


    $('body').on('click', '.delete-post', function () {
        var post_id = $(this).data("id");
        confirm("Are You sure want to delete !");
 
        $.ajax({
            type: "DELETE",
            url: "{{ url('ajax-posts')}}"+'/'+post_id,
            success: function (data) {
                $("#post_id_" + post_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });   
  });
 
 if ($("#postForm").length > 0) {
      $("#postForm").validate({
 
     submitHandler: function(form,e) {
         e.preventDefault()
      var actionType = $('#btn_save').val();
      $('#btn_save').html('Sending..');
      
      $.ajax({
          data: $('#postForm').serialize(),
          url: "{{ route('ajax-posts.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              var post = '<tr id="post_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.body + '</td>';
              post += '<td><a href="javascript:void(0)" id="edit-post" data-id="' + data.id + '" class="btn btn-info">Edit</a></td>';
              post += '<td><a href="javascript:void(0)" id="delete-post" data-id="' + data.id + '" class="btn btn-danger delete-post">Delete</a></td></tr>';
               
              
              if (actionType == "create-post") {
                  $('#posts_crud').prepend(post);
              } else {
                  $("#post_id_" + data.id).replaceWith(post);
              }
 
              $('#postForm').trigger("reset");
              $('#ajax_crud_modal').modal('hide');
              $('#btn_save').html('Save Changes');
              
          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn_save').html('Save Changes');
          }
      });
    }
    });
   
});


</script>
