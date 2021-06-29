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
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
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
                 <div id="todolist">
                 </div>
                 <div id="modals">
                 </div>
              </div>
          </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>


        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.get('{{URL::to("tasks")}}',function (data) {
                $('#todolist').empty().append(data);
            });

            $('#todolist').on('click','#btnAddTask', function () {
                // alert('hi');
                $.get('{{URL::to("todo/create")}}',function (data) {

                    $('#modals').empty().append(data);

                    $('#addTodoTask').modal('show');                    
                })
                
            });
            $('#todolist').on('click','.btnManage', function () {
                // alert('hi');
                var id = $(this).data('task');
                $.get('{{URL::to("todo/edit")}}/'+id,function (data) {
                    // alert('hi');
                    $('#modals').empty().append(data);

                    $('#editTodoTask').modal('show');                    
                })
                
            });
            $('#modals').on('click','#btnDelete', function () {
                // alert('hi');
                var id = $(this).data('task')
                $.get('{{URL::to("todo/destroy")}}/'+id,function (data) {

                    $('#todolist').empty().append(data);              
                })
                
            });
            $('#modals').on('submit','#frmAddTask', function (e) {
                e.preventDefault();    
                // alert('asd');
                var frmData = $(this).serialize();
                // alert(frmData);
                $.post('{{URL::to("todo/save")}}',frmData,function (data, xhrStatus, xhr) {
                    $('#todolist').empty().append(data);
                });            
            });
            $('#modals').on('submit','#frmEditTask', function (e) {
                e.preventDefault();    
                // alert('asd');
                var frmData = $(this).serialize();
                // alert(frmData);
                $.post('{{URL::to("todo/update")}}',frmData,function (data, xhrStatus, xhr) {
                    $('#todolist').empty().append(data);
                });            
            });
        });
    </script>

</body>
</html>

