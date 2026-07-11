<style>
    /* Premium Topbar Enhancements */
    .topbar {
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        border: none !important;
    }
    .topbar .topbar-left {
        background: linear-gradient(135deg, #3A1C71 0%, #D76D77 50%, #FFAF7B 100%) !important;
        box-shadow: 2px 0 15px rgba(0,0,0,0.1);
        border: none !important;
    }
    .topbar .topbar-left .logo {
        color: #fff !important;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }
    .navbar-default {
        background: #ffffff !important;
        border: none !important;
    }
    .button-menu-mobile {
        color: #555 !important;
        transition: all 0.3s ease;
        background: transparent !important;
    }
    .button-menu-mobile:hover {
        color: #D76D77 !important;
        transform: scale(1.1);
    }
</style>

<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="{{ url("/") }}" target="_blank" class="logo"><span>{{ config('app.name') }} </span></a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-user" style="font-size: 24px; color: white;"></i> </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route("password_change") }}"><i class="md md-settings"></i> Reset Profile</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="md md-settings-power"></i> Logout</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
