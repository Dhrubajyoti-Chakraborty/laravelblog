<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>





<div class="container">
    <div class="jumbotron">
        <div class="row">
            <h1>Laravel CRUD Jquery-Ajax-Bootstrap</h1>
            Button trigger modal
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
            Student Add Data
            </button>
            Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>




Modal
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
    
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

  -->




  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Student Details</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Student's Data</button>

  <br><br>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone No.</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
      <tr>
      <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->phone}}</td>
        <td>{{$student->address}}</td>
        <td>
          <button class="btn btn-success editbtn">Edit</button>
          <button class="btn btn-danger deletebtn">Delete</button>

        </td>
      </tr>
      @endforeach

    </tbody>
  </table>

    <!-- Add Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Student's Data</h4>
          </div>

          <form id="addform">
            <div class="modal-body">
              {{csrf_field()}}
              <!-- <p>Some text in the modal.</p> -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="phone">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="address">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>

        </div>
        
      </div>
    </div>


  
    <!-- Edit Modal -->
    <div class="modal fade" id="myEditModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Student's Data</h4>
          </div>

          <form id="editFormID">
            <div class="modal-body">
              {{csrf_field()}}
              {{method_field('PUT')}}
              <!-- <p>Some text in the modal.</p> -->
              <input type="hidden" name="id" id="id">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="address">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary ">Student data updated</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>

        </div>
        
      </div>
    </div>


      <!-- Delete Modal -->

    <div class="modal fade" id="myDeleteModal" tabindex="-1" aria-hidden="true" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="close">
              <span aria-hidden="true">&times;</span>            
              </button>
              <h4 class="modal-title">Delete Data Student</h4>
            </div>

            <form id="deleteFormID">
              <div class="modal-body">
                {{csrf_field()}}
                {{method_field('delete')}}
                <!-- <p>Some text in the modal.</p> -->
                <input type="hidden" name="id" id="delete_id">

                <p>Are you sure!! you want to Delete the Data?</p>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary ">Delete Student Data</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>

          </div>
          
        </div>
    </div>

  
</div>



<script>
  //  edit

$(document).ready(function(){

  $('.editbtn').on('click', function () {
    $('#myEditModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text(); 
    }).get();

    console.log(data);

    $('#id').val(data[0]);
    $('#name').val(data[1]);
    $('#phone').val(data[2]);
    $('#address').val(data[3]);

  });

  $('#editFormID').on('submit', function (e) {

   e.preventDefault();

  var id = $('#id').val();
   
   $.ajax({
     type: "PUT",
     url: "/studentupdate/"+id,
     data: $('#editFormID').serialize(),
     success: function (response) {
       console.log(response)
       $('#myEditModal').modal('hide') 
       alert("Data updated"); 
       location.reload();      
     },
     error: function (error) {
       console.log(error)
       alert("Data not updated");          
     }
   });
  });


});


</script>


<script>

// $(document).ready(function(){

  $('.deletebtn').on('click', function () {
    $('#myDeleteModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
        return $(this).text(); 
    }).get();

    console.log(data);

    $('#delete_id').val(data[0]);

  });
  

  $('#deleteFormID').on('submit', function (e) {

   e.preventDefault();

  var id = $('#delete_id').val();

  //  alert(id);
   $.ajax({
     type: "DELETE",
     url: "/studentdelete/"+id,
     data: $('#deleteFormID').serialize(),
     success: function (response) {
       console.log(response)
       $('#myDeleteModal').modal('hide'); 
       alert("Data deleted"); 
       location.reload();      
     },
     error: function (xhr) {
       console.log(xhr.responseText)
       alert("Data not deleted");    
     }
   });
  });


// });    


</script>

<script>
  
// store
$(document).ready(function(){
  $('#addform').on('submit', function (e) {
   e.preventDefault();
   $.ajax({
     type: "POST",
     url: "/studentadd",
     data: $('#addform').serialize(),
     success: function (response) {
       console.log(response)
       $('#myModal').modal('hide')
       alert("Data saved"); 
       location.reload();      
     },
     error: function (error) {
       console.log(error)
       alert("Data not saved");          
     }
   });    
  });
});

</script>

</body>
</html>