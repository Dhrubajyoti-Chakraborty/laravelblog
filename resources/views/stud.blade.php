<!DOCTYPE html>

<html>
<head>
<title>Laravel7 CRUD @fahmidasclassroom.com</title>
<!-- https://fahmidasclassroom.com/laravel-7-crud-using-bootstrap-modal/ -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<style>
    .jumbotron{
        height: 400px !important;
        margin-top: 79px;
    }
</style>
</head>
<body>

<!-- Add Student -->

<div class="modal" id="studaddmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
        <form id="addform" >
            <div class="modal-body">
                <!-- <input type="hidden" name="vend_id" id="vend_id"> -->
                 {{csrf_field()}}

                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>First Name</strong>
                        <input type="text" name="fname"  class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Last Name</strong>
                        <input type="text" name="lname" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Course</strong>
                        <input type="text" name="course"  class="form-control" placeholder="course">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Section</strong>
                        <input type="text" name="section" class="form-control" placeholder="section">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>

    </div>
  </div>
</div>




<!-- Edit Student -->

<div class="modal" id="studeditmodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
        <form id="editform" >
            <div class="modal-body">
                 {{csrf_field()}}
                  {{method_field('PATCH')}}
                <input type="hidden" name="id" id="id">

                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>First Name</strong>
                        <input type="text" name="fname" id="fname" class="form-control"  placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Last Name</strong>
                        <input type="text" name="lname" id="lname" class="form-control"  placeholder="Email">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Course</strong>
                        <input type="text" name="course" id="course" class="form-control"  placeholder="course">
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <strong>Section</strong>
                        <input type="text" name="section" id="section" class="form-control"  placeholder="section">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Data Updated</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>

    </div>
  </div>
</div>



<!-- Delete Student -->

<div class="modal" id="studdeletemodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                
        <form id="deleteform" >
            <div class="modal-body">
                 {{csrf_field()}}
                  {{method_field('delete')}}
                <input type="hidden" name="id" id="deleteid">

               <p>Are you sure to delete ?</p>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Data Deleted</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>

    </div>
  </div>
</div>


<!-- index page -->


<div class="container">
    <div class="jumbotron">
        <div class="row">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studaddmodal">Student Add Data</button>
            <div class="col-lg-2"></div>
            <h1>Edit Data Of Students using AJAX jquery</h1> 
         
        </div>
        <br>
        <table class="table table-bordered bg-light">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Course</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
            @foreach ($studs as $stud)
            <tr >
                <td>{{ $stud->id }}</td>
                <td>{{ $stud->fname }}</td>
                <td>{{ $stud->lname }}</td>
                <td>{{ $stud->course }}</td> 
                <td>{{ $stud->section }}</td>
                <td>
                    <button class="btn btn-success editbtn">Edit</button>
                    <button class="btn btn-danger deletebtn">Delete</button>
                </td>
                <td>
               

                </td>
            </tr>
            @endforeach

        </table>


    </div>
</div>


    
</body>

<script>

    $(document).ready(function () {
        $('.editbtn').on('click',function () {
            $('#studeditmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                 return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]); 
            $('#fname').val(data[1]);
            $('#lname').val(data[2]);
            $('#course').val(data[3]);
            $('#section').val(data[4]);

        })

        $(document).ready(function () {
    $('#editform').on('submit',function (e) {
        e.preventDefault();
       
       var id = $('#id').val();
        $.ajax({
           type: "PUT",
           url: "/studupdate/"+id,
           data: $('#editform').serialize(),
           success: function (response) {
               console.log(response)
               $('#studeditmodal').modal('hide')
               alert('Data updated');
               location.reload();
           },
           error: function (error) {
               console.log(error)
               alert("Data not updated");
           } 
        });
    })    
})
        
    })
</script>

<script type="text/javascript">

$(document).ready(function () {
    $('#addform').on('submit',function (e) {
        e.preventDefault();

        $.ajax({
           type: "POST",
           url: "/studadd",
           data: $('#addform').serialize(),
           success: function (response) {
               console.log(response)
               $('#studaddmodal').modal('hide')
               alert('Data saved');
               location.reload();
           },
           error: function (error) {
               console.log(error)
               alert("Data not saved");
           } 
        });
    })    
})



</script>

<script>

    $('.deletebtn').on('click',function () {
        $('#studdeletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children('td').map(function () {
            return $(this).text();
        }).get();

        console.log(data);

        $('#deleteid').val(data[0]);

    })

        //delete form submit
   $('#deleteform').on('submit', function (e) {
       e.preventDefault();

       var id = $('#deleteid').val();

       $.ajax({
           type: "DELETE",
           url: '/studdelete/'+id,
           data: $('#deleteform').serialize(),
           success: function (response) {
               console.log(response);
               $('#studdeletemodal').modal('hide');
               alert("Data Deleted");
               location.reload();
           },
           error: function (error) {
               console.log(error);
           }
       })
   })


    
</script>


</html>
