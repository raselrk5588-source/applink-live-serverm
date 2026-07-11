<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{{config("app.site_name")}}">
        <meta name="author" content="{{config("app.site_name")}}">


    <link rel="shortcut icon" href="{{asset("admin")}}/images/favicon.ico">

        <title>Register</title>

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
        <script src="{{ asset("admin")}}/js/modernizr.min.js"></script>

    </head>
    <body>


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img">
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Register to <strong>{{ config('app.name') }}</strong> </h3>
                </div>
                <div class="panel-body">
                     <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">

                            <div class="col-md-12">
                            <label for="name" >{{ __('Name:') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="phone">{{ __('Phone:') }}</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required >

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <label for="email">{{ __('E-Mail Address:') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="university_id">{{ __('University Name:') }}</label>
                                @php
                                    $university=\App\University::orderBy("name","asc")->get();
                                @endphp
                                <select name="university_id" id="university_id" required class="form-control">
                                       <option value="">--Select--</option> 
                                       @foreach ($university as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option> 
                                       @endforeach
                                </select>
                                @error('university_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                            <label for="password">{{ __('Password:') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="password-confirm" >{{ __('Confirm Password:') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                    <div class="form-group text-center">
                        <div class="col-xs-12 m-t-10">
                                <button type="submit" class="btn btn-primary btn-lg w-lg waves-effect waves-light">
                                    {{ __('Register') }}
                                </button><br>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="col-sm-12 m-t-15 text-center">
                            <a href="{{route("login")}}" class="text-danger">Already have account?</a>
                        </div>
                    </div>

                </form>
                </div>

            </div>
        </div>
	</body>
</html>
