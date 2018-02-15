@extends("Jlib::layouts.Login")


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
                            <input name="email" type="email" class="form-control" placeholder="email" required=""/>
                        </div>

                        <div>
                            <button class="btn btn-default submit"
                                    type="submit">{{_T("Jlib::admin.send email password")}}</button>

                            <a class="reset_pass" href="{{@$panelURI."/auth/login"}}">Have Account ? Login !</a>
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