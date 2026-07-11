@extends('layout.default')
@section('title_area')
Install App
@endsection
@section('main_section')
    <div class="content">
        <div class="container">
             @if(Session::has('message'))
                <div class="alert alert-{{Session::get("class")}}">{{Session::get("message")}}</div>
             @endif
            <!-- Start Widget -->
                <div class="row">
                    @isset($add)
                    {!! Form::open(['url' => 'user/install']) !!}
                    @method("POST")
                        <div class="col-sm-6">
                            <div class="panel-group panel-group-joined" id="accordion-test">
                                <div class="panel panel-border panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne" class="collapsed">
                                                Install App
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="app_name">App Name</label><small class="req">*</small>
                                                    <input  name="app_name" type="text" class="form-control"  requiredid="app_name" placeholder="App Name">
                                                    @error('app_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="app_id">App ID</label><small class="req">*</small>
                                                    <input  name="app_id" type="text" class="form-control"  requiredid="app_id" placeholder="APP_XXXXXX">
                                                    @error('app_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="password">App Password</label><small class="req">*</small>
                                                    <input  name="password" type="text" class="form-control"  requiredid="password" placeholder="Password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="sms_keyword">SMS Keyword</label><small class="req">*</small>
                                                    <input  name="sms_keyword" type="text" class="form-control"  requiredid="sms_keyword" placeholder="SMS Keyword">
                                                    @error('sms_keyword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="ussd_code">USSD Code</label><small class="req">*</small>
                                                    <input  name="ussd_code" type="text" class="form-control"  required id="ussd_code" placeholder="*213*XXXX#">
                                                    @error('ussd_code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="sms_time">Sms Time</label><small class="req">*</small>
                                                    <div id="spinner4">
                                                        <div class="input-group">
                                                            <div class="spinner-buttons input-group-btn">
                                                                <button type="button" class="btn spinner-down btn-danger waves-effect waves-light">
                                                                    <i class="fa fa-minus"></i>
                                                                </button>
                                                            </div>
                                                            <input type="text" name="sms_time" class="spinner-input form-control" maxlength="2" readonly>
                                                            <div class="spinner-buttons input-group-btn">
                                                                 <button type="button" class="btn spinner-up btn-success waves-effect waves-light">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('sms_time')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group m-t-22">
                                                    <select name="sms_time_format" id="sms_time_format" class="selectpicker form-control" data-container="body" >
                                                        <option value="0">AM</option>
                                                        <option value="1">PM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="category_id">Category</label><small class="req">*</small>
                                                    <select name="category_id" id="category_id" class="selectpicker form-control" data-container="body" data-live-search=true>
                                                        <option value="">--Select--</option>
                                                        @isset($category)
                                                            @foreach($category as $key=>$value)
                                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                    @error('category_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group pull-left m-t-22">
                                                    <input type="submit" class=" btn btn-primary pull-right" value="Install" name="submit" />
                                                </div>
                                            </div>
                                        </div> <!-- panel-body -->
                                    </div>
                                </div> <!-- panel -->
                            </div>
                        </div> <!-- col -->
                        {!! Form::close() !!}
                    @endisset
                </div>
        </div> <!-- container -->
    </div>
        <script type="text/javascript" src="{{asset("admin")}}/vendors/spinner/spinner.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#spinner4').spinner({value:8, step: 1, min: 1, max: 12});
        });
    </script>
@endsection
