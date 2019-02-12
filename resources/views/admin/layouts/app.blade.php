<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
</head>

@section("css")
<!-- Custom fonts for this template-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- Custom styles for this template -->
<link href="{{ asset("css/dataTables.bootstrap4.min.css") }}" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="{{ asset("css/sb-admin.min.css") }}" rel="stylesheet">

@show

@section('bodyTag')
<body>
@show

@include('admin.mainStructure.navbar')

<!-- wrapper start -->
<div id="wrapper">
    @include('admin.mainStructure.sidebar')

    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- content start -->
            @section("content")

            @show
            <!-- content finish -->

        </div>
        <!-- /.container-fluid -->

        @include('admin.mainStructure.footer')

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

@include('admin.mainStructure.additional')


@section("js")
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset("js/dataTables.bootstrap4.js") }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset("js/sb-admin.min.js") }}"></script>

    <!-- Demo scripts for this page-->
@show
</body>



</html>