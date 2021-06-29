<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                 <div id="todo">
                    
                 </div>
                 <div id="modals">

                 </div>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>

     $(function () {
            //    alert('hi');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.get('{{URL::to("tasks")}}',function (data) {
                $('#todo').empty().append(data);                
            });

            $('#todo').on('click','#btnAddTask', function () {
                $.get('{{URL::to("todolist/create")}}',function (data) {
                         $('#modals').empty().append(data); 
                         $('#addTodoTask').modal('show');        
                });
            });
            $('#modals').on('submit','#frmAddTask', function (e) {
                e.preventDefault();
                // alert('asd');
                var frmData = $(this).serialize();
                $.post('{{URL::to("todolist/save")}}',frmData,function (data,xhrStatus,xhr) {
                // alert('asd');
                     $('#todo').empty().append(data);  
                });
            });
            $('#todo').on('click','.btnManage', function () {
                var id = $(this).data('task');
                $.get('{{URL::to("todolist/edit")}}/'+id,function (data) {
                         $('#modals').empty().append(data); 
                         $('#editTodoTask').modal('show');        
                });
            });
            $('#modals').on('submit','#frmEditTask', function (e) {
                e.preventDefault();
                // alert('asd');
                var frmData = $(this).serialize();
                $.post('{{URL::to("todolist/update")}}',frmData,function (data,xhrStatus,xhr) {
                // alert('asd');
                     $('#todo').empty().append(data);  
                });
            });
            $('#modals').on('click','#btnDelete',function () {
                // alert('asd');
                var id = $(this).data('task');
                $.get('{{URL::to("todolist/destroy")}}/'+id,function (data) {
                   $('#todo').empty().append(data);
                });
            });

     })


    </script>
  </body>
</html>

