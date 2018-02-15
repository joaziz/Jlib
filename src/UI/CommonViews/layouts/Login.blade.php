<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{{url("/public")}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{@$adminTitle}} | {{@$pageTitle}}</title>

    <!-- Bootstrap -->
    <link href="vendor/Jlib/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendor/Jlib/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendor/Jlib/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendor/Jlib/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="vendor/Jlib/build/css/custom.min.css" rel="stylesheet">

    @yield("css")
</head>

<body class="login">

@yield("content")

<div hidden id="notificationMessage">
    @include('flash::message')
</div>
<script src="vendor/Jlib/vendors/jquery/dist/jquery.js"></script>
<script src="vendor/Jlib/js/notify.min.js"></script>
<script src="vendor/Jlib/js/LaravelError.js"></script>
<script>
    (function () {
        $("#notif-holder").prepend($("#notificationMessage").html());
        var errors = @json($errors->getMessages());
        LaravelErrors(errors).showHints();
    })()
</script>

</body>
</html>
