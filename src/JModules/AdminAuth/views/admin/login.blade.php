@extends("Jlib::layouts.Login")

{{--{{ dd(get_defined_vars()) }}--}}
@section("css")
    <style>

        #keebMe {
            display: flex;
            /*align-content: center;*/
      align-items: center;
        }
    </style>
@stop
@section("content")

    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="post">
                        {{csrf_field()}}
                        <h1>Login Form</h1>
                        <div id="notif-holder"></div>
                        <div>
                            <input name="loginInput" type="text" class="form-control" placeholder="email" required=""/>
                        </div>
                        <div>
                            <input name="password" type="password" class="form-control" placeholder="Password"
                                   required=""/>
                        </div>
                        <div class="text-left">
                            <label id="keebMe" for="rm">
                                <input id="rm" name="remember_me" type="checkbox" class="   "/>
                                <span>Keep me login</span>
                            </label>
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Login</button>
                            <a class="reset_pass"
                               href="{{@$panelURI."/auth/forget-password"}}">Lost your
                                password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">


                            <div class="clearfix"></div>
                            <br/>

                            <div>
                                <img style="width: 35px;"
                                     src="vendor/Jlib/images/hive-big-logo.png">
                                <h1>    {{@$companyName}}! </h1>
                                <p>
                                    ©{{date("Y")}} All Rights Reserved.
                                    <a target="_blank" style="text-decoration: underline"
                                       href="{{@$companyWebsite}}">
                                        {{@$companyName}} !
                                    </a>
                                    is a Advertising Company.
                                </p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>


        </div>
    </div>
@stop