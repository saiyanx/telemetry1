<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Telemetry</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"><\/script>')</script>
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Add gauge library -->
    <script src="js/gauge.min.js"></script>
    <script>
        $(".nav-item a").on("click", function(){
         $(".nav-item").find(".active").removeClass("active");
         $(this).parent().addClass("active");
      });
      //jQuery
      $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
      });

      });
    </script>
    @yield('scripts')
  </head>

  <body>


    <nav class="navbar navbar-expand-md fixed-top">
      <a id="logo" href="#"><img class="stnd default-logo dark-version" alt="CapeMay Scientific" src="http://capemayscientific.com/wp-content/uploads/2018/01/logo_original.png" srcset="http://capemayscientific.com/wp-content/uploads/2018/01/logo_original.png 1x, http://capemayscientific.com/wp-content/uploads/2018/01/logo_original.png 2x" style="height: 85px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsDefault">
        <ul class="navbar-nav mr-auto">
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            @else
                <li class="dropdown dropdown-color">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->first_name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right dropdown-color">
                        <li>
                               <?php if(Auth::user()->hasRole('Administrator')) : ?>
                                  <a href="{{ route('admin') }}">Admin Settings</a>
                                <?php endif; ?>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
      </div>
    </nav>

<!--Sidebar NAV-->
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
          <div class="navbar-header">
              <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                  <i class="fa fa-align-left"></i>
              </button>
          </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a class="nav-link"  href="/summary">
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="/fleet">
                        <i class="fa fa-briefcase"></i>
                        <span>Fleet</span>
                    </a>
                    <a class="nav-link"  href="/fleet">
                        <i class="fa fa-duplicate"></i>
                        <span>Virtual Site</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="/fleet">
                        <i class="fa fa-link"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="/fleet">
                        <i class="fa fa-paperclip"></i>
                          <span>Trends</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="/fleet">
                        <i class="fa fa-send"></i>
                          <span>Alarms</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="/fleet">
                        <i class="fa fa-send"></i>
                          <span>Controller Settings</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="/fleet">
                        <i class="fa fa-send"></i>
                          <span>Support</span>
                    </a>
                </li>
            </ul>
        </nav><!--Sidebar NAV-->

    <div class="card">
      <div class="card-header">
        <header id="header">
          @yield('header')
        </header>
      </div>
      <div class="card-body">

            <main role="main">

              @yield('content')

            </main><!-- /.container -->
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
