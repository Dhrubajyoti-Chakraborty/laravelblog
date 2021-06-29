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

    // when new vendor button pressed
    // $('#new-vendor').click(function () {
    //     $('#btn-save').val('create-vendor');
    //     $('#vendor').trigger('reset');
    //     $('#vendorCrudModal').html('Add New Vendor');
    //     $('#crud-modal').modal('show');
        
    // });
    $('#new-vendor').click(function () {
$('#btn-save').val("create-vendor");
$('#vendor').trigger("reset");
$('#vendorCrudModal').html("Add New vendor");
$('#crud-modal').modal('show');
});

    // Edit Vendor
    $(body).on('click','#edit-vendor', function () {
       var $vendor_id  =  $(this).data('id');
       $.get('vendors/'+$vendor_id+'/edit',function (data) {
          $('#vendorCrudModal').html('Edit Vendor');
          $('#btn-update').val('update');
          $('#btn-save').prop('disabled',false);
          $('#crud-modal').modal('show');
          $('#vend_id').val(data.id);
          $('#name').val(data.name); 
          $('#email').val(data.email); 
          $('#address').val(data.address); 

       }); 
    });

    // show
    /* Show customer */
$('body').on('click', '#show-vendor', function () {
$('#vendorCrudModal-show').html("vendor Details");
$('#crud-modal-show').modal('show');
});

/* Delete vendor */
$('body').on('click', '#delete-vendor', function () {
var vendor_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");

$.ajax({
type: "DELETE",
url: "vendors/"+vendor_id,
data: {
"id": vendor_id,
"_token": token,
},
success: function (data) {
$('#msg').html('vendor entry deleted successfully');
$("#vendor_id_" + vendor_id).remove();
},
error: function (data) {
console.log('Error:', data);
}
});
}); 
});

    


</script>
</html>
