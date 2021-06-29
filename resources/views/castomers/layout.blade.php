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
</head>
<body>
<div class="container">
@yield('content')
</div>
</body>
<script>
$(document).ready(function () {

/* When click New customer button */
$('#new-castomer').click(function () {
$('#btn-save').val("create-customer");
$('#castomer').trigger("reset");
$('#castomerCrudModal').html("Add New Customer");
$('#crud-modal').modal('show');
});

});








</script>
</html>