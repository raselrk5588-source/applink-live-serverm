@extends('admin.layout.default')
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
                        <span class="mini-stat-icon bg-info"><i class="md   md-perm-identity"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="">{{$total_active_user ?? ''}}</span>
                            Total Active User
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-primary"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{$total_pending_user ?? ''}}</span>
                            Total Pending
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-lg-3">
                    <div class="mini-stat clearfix bx-shadow">
                        <span class="mini-stat-icon bg-info"><i class="fa fa-user"></i></span>
                        <div class="mini-stat-info text-right text-muted">
                            <span class="counter">{{$new_register_user ?? ''}}</span>
                          New Register User
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container -->
    </div>
@endsection
