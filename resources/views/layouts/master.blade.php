<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | </title>

		<!-- jQuery -->
		<script src="/js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/css/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css" rel="stylesheet">

		@yield('scripts')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span>CapeMayScientific</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">

                <span>Welcome,</span>
								<!-- Authentication Links -->
								@guest
										<h2>Guest</h2>
								@else
										<h2>{{ Auth::user()->first_name }} </h2>
								@endguest

              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Navigation</h3>
                <ul class="nav side-menu">
                  <li><a href="/"><i class="fa fa-home"></i> Home </a>  </li>

                  <li><a href="/fleet"><i class="fa fa-tachometer"></i> Fleet </a>    </li>

									<li><a href="/virtualsite"><i class="fa fa-globe"></i> Virtual Site </a>    </li>

									<li><a href="/reports"><i class="fa fa-file-excel-o"></i> Reports </a>    </li>

									<li><a href="/trends"><i class="fa fa-bar-chart"></i> Trends </a>    </li>

									<li><a href="/groups"><i class="fa fa-bar-chart"></i> Groups </a>    </li>

									<li><a><i class="fa fa-bell"></i> Alarms </a>    </li>

									<li><a><i class="fa fa-gear"></i> Controller Settings </a>    </li>

									<li><a><i class="fa fa-phone"></i> Support </a>    </li>

              </div>  <!-- div menu -->

            </div>
            <!-- /sidebar menu -->


          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">

									<!-- Authentication Links -->
									@guest
									<a>Guest</a>

									@else
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->first_name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
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
														<i class="fa fa-sign-out pull-right"></i>
												</a>

												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
														{{ csrf_field() }}
												</form>
										</li>

                    <li><a href="javascript:;">Help</a></li>

                  </ul>
									@endguest
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <div class="page-title">
              <div class="title_left">
                @yield('header')
              </div>
            </div>


            <div class="clearfix"></div>
						<br/>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   <h2> @yield('PanelTitle')</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      @yield('content')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <!-- Bootstrap -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/js/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/js/custom.min.js"></script>
  </body>
</html>
