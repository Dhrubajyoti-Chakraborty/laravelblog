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
</div>  
    
</body>
</html>