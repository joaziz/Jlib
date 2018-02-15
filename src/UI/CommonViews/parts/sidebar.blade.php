

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
                <img style="width: 35px;margin-top: -12px" src="vendor/Jlib/images/hive-big-logo-w.png">
                <span>Panel</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{$authUser->avatar}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>{{$authUser->username}},</span>
                <h2>{{$authUser->email}}</h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
           @include("Jlib::parts.menu")

        </div>
        <!-- /sidebar menu -->

    </div>
</div>