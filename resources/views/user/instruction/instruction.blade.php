@extends('layout.default')
@section('title_area')
Instruction
@endsection
@section('main_section')
    <div class="content">
        <div class="container">
            <!-- Start Widget -->
                <div class="row">
                    <div class="col-sm-8">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne" class="collapsed">
                                            Instruction
                                        </a>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td><strong>Allowed Host Address: </strong></td>
                                                <td><code id="host_address">{{ $host_address  }}</code></td>
                                                <td><button onclick="copyText('{{$host_address}}')" class="btn btn-success">Copy Url</button></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Message Receiving URL: </strong></td>
                                                <td><code id="sms_url">{{ $sms_url  }}</code></td>
                                                <td><button  onclick="copyText('{{$sms_url}}')" class="btn btn-success">Copy Url</button></td>
                                            </tr>
                                            <tr>
                                                <td><strong>USSD Receiving URL: </strong></td>
                                                <td><code>{{ $ussd_url  }}</code></td>
                                                <td><button onclick="copyText('{{ $ussd_url  }}')" class="btn btn-success">Copy Url</button></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Notification URL: </strong></td>
                                                <td><code>{{ $notification_url  }}</code></td>
                                                <td><button onclick="copyText('{{ $notification_url  }}')" class="btn btn-success">Copy Url</button></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- panel -->
                    </div> <!-- col -->
                </div>
        </div> <!-- container -->
    </div>
<script src="{{asset("admin")}}/vendors/notifications/notify.min.js"></script>
<script src="{{asset("admin")}}/vendors/notifications/notify-metro.js"></script>
<script src="{{asset("admin")}}/vendors/notifications/notifications.js"></script>
    <script>
    function copyText(str) {
      const el = document.createElement('textarea');
      el.value = str;
      document.body.appendChild(el);
      el.select();
      document.execCommand('copy');
      $.Notification.autoHideNotify('success', 'top right',"Copied");
      document.body.removeChild(el);
    }
</script>

@endsection
