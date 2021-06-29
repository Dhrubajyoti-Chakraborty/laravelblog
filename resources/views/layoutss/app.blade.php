<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel AJAX CRUD</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/4.0.0-alpha.5.bootstrap-flex.min.css">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>

<body style="margin-top: 60px" class="container">

@yield('content')

<script src="js/3.1.1.jquery.min.js"></script>
<script src="js/1.3.7.tether.min.js"></script>
<script src="js/4.0.0-alpha.5.bootstrap.min.js"></script>
<script src="{{asset('js/link.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
