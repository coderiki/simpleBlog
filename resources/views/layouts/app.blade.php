<!DOCTYPE html>
<html lang="{{ Config::get('app.locale', 'default') }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield("title")</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset("css/app.css") }}" rel="stylesheet">

</head>

<body>

@include("mainStructure.header")

<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-8">
            @section("content")
                @show
        </div>

        <div class="col-md-4">
            @include("mainStructure.sidebar")
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@include("mainStructure.footer")

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>