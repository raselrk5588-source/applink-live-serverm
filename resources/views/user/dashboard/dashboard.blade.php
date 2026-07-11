@extends('layout.default')
@section('title_area')
    Dashboard
@endsection
@section('main_section')
    <div class="content">
        @if(Session::has('message'))
            <div class="alert alert-{{Session::get("class")}}">{{Session::get("message")}}</div>
        @endif
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Welcome To Dashboard !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">{{config('app.name')}}</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-4 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-info"><i class="md  md-shopping-basket"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="">{{$install_app}}/{{config('app.total_install_limit')}}</span>
                            Total Install
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-primary"><i class="md  md-wallet-giftcard"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{$total_left}}</span>
                            Total Left
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-info"><i class="fa fa-usd"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">0.00</span>
                            Monthly Fee
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @isset($total_apps)
                    @foreach($total_apps as $key=>$value)
                        <a href="{{url("user/app-content/".$value['id'])}}">
                            <div class="col-md-4 col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow">
                                    <span class="mini-stat-icon bg-{{$value['class_name']}}"><i class="md  md-question-answer"></i></span>
                                    <div class="mini-stat-info text-right text-muted">
                                        <span class="counter"> {{$value['app_remain_sms']}}</span>
                                        <p class="m-t-5">{{$value['app_name']}}<small><code>({{$value['ussd_code']?$value['ussd_code']:"USSD CODE"}})</code></small></p>
                                        <p class="m-t-5">Category: {{$value['category_name']}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endisset
            </div>
        </div> <!-- container -->
    </div>
@endsection
