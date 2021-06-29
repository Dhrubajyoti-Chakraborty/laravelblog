<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <div id="todos">

    </div>
    <div id="modals">

</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
     $(function () {
        //  alert('asdf');

         $.get('{{URL::to("tasks")}}',function (data) {
             $('#todos').empty().append(data);
         }); 

         $('#todos').on('click','#btnAddTask',function () {
        //  alert('asdf');

             $.get('{{URL::to("todoslist/create")}}',function (data) {
                 $('#modals').empty().append(data);
                 $('#addTodoTask').modal('show');
             });
         });
         $('#modals').on('submit','#frmAddTask',function (e) {
        //  alert('asdf');
           e.preventDefault();
            var frmData = $(this).serialize();
             $.post('{{URL::to("todoslist/save")}}',frmData,function (data,xhrStatus,xhr) {
        //  alert('asdf');
                 $('#todos').empty().append(data);
             })
                           
         });
         $('#todos').on('click','.btnManage',function (data) {
              // alert('asdf');
              var id = $(this).data('task');
              $.get('{{URL::to("todoslist/edit")}}/'+id,function (data) {
              // alert('asdf');
              $('#modals').empty().append(data);
               $('#editTodoTask').modal('show');
                  
              });
         });    
         $('#modals').on('submit','#frmEditTask',function (e) {
              // alert('asdf');
              e.preventDefault();
              var frmData = $(this).serialize();
              $.post('{{URL::to("todoslist/update")}}',frmData,function (data,xhrStatus,xhr) {
              // alert('asdf');
              $('#todos').empty().append(data);
              });
         });
         $('#modals').on('click','#btnDelete',function () {
          // alert('asdf');
          var id = $(this).data('task');
            $.get('{{URL::to("todoslist/destroy")}}/'+id,function (data) {
          // alert('asdf');
            $('#todos').empty().append(data);
            })
         })

     });
   


  </script>

</body>
</html>