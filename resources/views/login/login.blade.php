<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name = "viewport" content = "width = device-width, user-scalable = 0, initial-scale = 1.0, maximum-scale = 1.0" />
        <meta name="description" content="{{config("app.site_name")}}">
        <meta name="author" content="{{config("app.site_name")}}">


    <link rel="shortcut icon" href="{{asset("admin")}}/images/favicon.ico">

        <title>Login</title>

        <!-- Base Css Files -->
        <link href="{{ asset("admin")}}/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->

        <!-- animate css -->
        <link href="{{ asset("admin")}}/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset("admin")}}/css/waves-effect.css" rel="stylesheet">

        <!-- Custom Files -->
        <link href="{{ asset("admin")}}/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset("admin")}}/css/style.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset("admin")}}/css/custom.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
            <style>
                input
                {
                    border: 1px solid #ddd!important;
                }
            </style>

    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img">
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>{{ config('app.name') }}</strong> </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Mobile Number" name="phone" value="{{ old('phone') }}" required >

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 m-t-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <div class="form-group text-center">
                        <div class="col-xs-12 m-t-10">
                            <button type="submit" class="btn btn-primary btn-lg w-lg waves-effect waves-light">
                                    {{ __('Login') }}
                                </button><br>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-sm-9 m-t-15">
                            <a href="tel:{{config('app.app_phone')}}" class="text-danger"><i class="fa fa-lock m-r-5"></i> Password? Call {{config("app.app_phone")}}</a>
                        </div>
                        <div class="col-sm-3 text-right m-t-15">
                            <a href="{{route("register")}}" class="text-danger">Register</a>
                        </div>
                    </div>

                </form>
                </div>

            </div>
        </div>
	</body>
</html>
