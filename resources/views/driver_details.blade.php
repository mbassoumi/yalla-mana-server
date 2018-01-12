
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Details</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/driverDetails.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Yalla Mana</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <h1 class="my-4 text-center text-lg-left">{{$user->name}} Details</h1>

    <div class="row text-center text-lg-left">


        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" onClick="MyWindow=window.open('#','MyWindow',width=600,height=300); return false;" class="d-block mb-4 h-100">
                Driving Licence
                <img class="img-fluid img-thumbnail" src="{{$media->getUrl('thumb')}}" height="400" width="300" alt="http://placehold.it/400x300">
            </a>
        </div>

        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" onClick="MyWindow=window.open('#','MyWindow',width=600,height=300); return false;" class="d-block mb-4 h-100">
                Car Licence
                <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
            </a>
        </div>


        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#" onClick="MyWindow=window.open('#','MyWindow',width=600,height=300); return false;" class="d-block mb-4 h-100">
                Driver Picture
                <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
            </a>
        </div>


        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="#"  onClick="MyWindow=window.open('#','MyWindow',width=600,height=300); return false;" class="d-block mb-4 h-100">
                Car Picture
                <img class="img-fluid img-thumbnail" src="http://placehold.it/400x300" alt="">
            </a>
        </div>


        <div class="col-lg-3 col-md-4 col-xs-6">

        </div>

        {{--Accept--}}
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="/user/{{$user->id}}/accept-driver" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://storage.googleapis.com/yalla-mana.appspot.com/true.png" height="400" width="300" alt="">
            </a>
        </div>

        {{--decline--}}
        <div class="col-lg-3 col-md-4 col-xs-6">
            <a href="/user/{{$user->id}}/decline-driver" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="https://storage.googleapis.com/yalla-mana.appspot.com/false.png" height="400" width="300" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6">

        </div>

    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Yalla mana application</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
