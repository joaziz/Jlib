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
    <link href="vendor/Jlib/css/jquery-ui.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendor/Jlib/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendor/Jlib/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="vendor/Jlib/build/css/custom.min.css" rel="stylesheet">
    @yield("css")
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

    @include("Jlib::parts.sidebar")

    <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.jpg" alt="">{{$authUser->username}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{$panelURI."/profile"}}"> Profile</a></li>
                                <li><a href="{{$panelURI."/auth/logout"}}"><i class="fa fa-sign-out pull-right"></i> Log
                                        Out</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="page-title">
                    <div class="title_left">
                        <h3>{{(@$pageTitle)?: "page title"}}</h3>
                    </div>

                </div>

                <div class="clearfix"></div>
                <hr/>
                <div style="width: 75%;margin: 0 auto">
                    @include('flash::message')
                </div>

                <div class="row">
                    @yield("content")
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Hive panel - designed and developed by <a target="_blank"
                                                          href="{{@$companyWebsite}}">{{@$companyName}}</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="vendor/Jlib/vendors/jquery/dist/jquery.min.js"></script>
<script src="vendor/Jlib/js/jquery-ui.min.js"></script>
<!-- Bootstrap -->
<script src="vendor/Jlib/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="vendor/Jlib/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vendor/Jlib/vendors/nprogress/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="vendor/Jlib/build/js/custom.min.js"></script>
<script>
    $(document).on('error', 'img', function () {
        console.log(this)
    })
    console.log(this)
</script>
<script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>
    var ckview = $('.richtext').ckeditor();
    CKEDITOR.replace(ckview,{
        language:'en'
    });

</script>
<script>
    $('.richtext').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
</script>
@yield("js")
</body>
</html>