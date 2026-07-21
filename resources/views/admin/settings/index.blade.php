@extends('admin.layout.default')
@section('title_area')
    Settings
@endsection
@section('main_section')
    <div class="content">
        @if(Session::has('message'))
            <div class="alert alert-{{Session::get("class")}}">{{Session::get("message")}}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Site Settings</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">{{config('app.name')}}</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Update Settings</h3></div>
                        <div class="panel-body">
                            <form role="form" action="{{ url('admin/settings') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="total_install_limit">Default App Install Limit</label>
                                    <input type="number" class="form-control" id="total_install_limit" name="total_install_limit" value="{{ $limit }}" required min="1">
                                    <p class="help-block">This is the default number of apps a user can install.</p>
                                </div>
                                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
