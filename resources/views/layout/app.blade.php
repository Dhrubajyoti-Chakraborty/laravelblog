<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>
<body>
 
    <nav class="navbar navbar-default navbar-ststic-top">
        <div class="container">
           <div class="navbar-header">
              <a href="{{route('post.index')}}" class="navbar-brand">CodELog</a>
           </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- ajax form add -->
  <script type="text/javascript">
       $(document).on('click','.create-modal', function(e) {
        e.preventDefault();
          $('#create').modal('show');
          $('.form-horizontal').show();
          $('.modal-title').text('Add Post'); 
       });  


    //    function Add(Save)
    // $("#add").click(function (e) {
    //     e.preventDefault();

    //     $.ajax({
    //         type : 'POST',
    //         url : 'addPost',
    //         data : {
    //             '_token' : $('input[name=_token]').val(),
    //             'title' : $('input[name=title]').val(),
    //             'body' : $('input[name=body]').val(),
    //         },
    //         success : function(data) {

    //             if ((data.errors)){
    //                 $('.error').removeClass('hidden');
    //                 $('.error').text(data.errors.title);
    //                 $('.error').text(data.errors.body);
    //            }else{
    //                $('.error').remove();

    //                $('#table').append(
    //                 "<tr class='post"+data.id+"'>"+
    //            "<td>"+data.id+"</td>"+
    //            "<td>"+data.title"</td>"+
    //            "<td>"+data.body+"</td>"+
    //            "<td>"+data.created_at+"</td>"+
    //            "<td><a href="" class='show-modal btn btn-info btn-sm' data-id=' "+ data.id +" ' data-title=' " +data.title + " ' data-body=' " + data.body + " '> "+
    //                   "<i class='fa fa-eye'></i></a>" +
    //                "<a href="" class='edit-modal btn btn-warning btn-sm' data-id=' "+ data.id +" ' data-title=' " +data.title + " ' data-body=' " + data.body + " '> "+
    //                   "<i class='fa fa-pencil'></i></a>" +
    //                "<a href="" class='delete-modal btn btn-danger btn-sm' data-id=' "+ data.id +" ' data-title=' " +data.title + " ' data-body=' " + data.body + " '> "+
    //                   "<i class='fa fa-trash'></i></a>" +
    //            "</td>"

    //          "</tr>");
    //            }
    //         },
    //     });
    //     $('#title').val('');
    //     $('#body').val('');        
    // });
  </script>  

</body>
</html>