@if(!isset($user))
    @php
    $user = Auth::user()
    @endphp
@endif
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<link rel="icon" href="public/assets/admin/images/favicon.ico" type="image/ico" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
	{{-- <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> --}}
	
    <!-- Bootstrap -->
    <link href="{{ asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/admin/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	 <!-- Bootstrap Colorpicker -->
	 <link href="{{ asset('assets/admin/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('assets/admin/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Switchery -->
	  <link href="{{ asset('assets/admin/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
     <!-- Datatables -->
     <link href="{{ asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }} rel="stylesheet">
     <link href="{{ asset('assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/admin/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
	
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <img src="{{ asset('assets/logo.png') }}" alt="" style="max-width: 100%;padding:5px;background:#fff">
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              </div>
              <div class="profile_info text-center">
                
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
			@include('layouts.navadmin')
            
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="{{route('voir.user',$user->id)}}"><i class="fa fa-user pull-right"></i>Profile</a>
					<form action="{{ route('logout') }}" method="post">
						@csrf
						<a class="dropdown-item"  href="javascript:;" onclick="event.preventDefault();
						this.closest('form').submit();"><i class="fa fa-sign-out pull-right"></i> Deconnexion</a>
					</form>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">{{sizeOf($notifications)}}</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    @foreach($notifications as $notification)
                      <li class="nav-item">
                        <a class="dropdown-item" href="{{route('voir.notification',$notification->id)}}">
                          <div>
                            <b class="">{{$notification->NotifTime()}}</b><br>
                            <span class="message">
                              {{$notification->message}}
                            </span>
                          </div>
                        </a>
                      </li>
                    @endforeach
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item" href="{{route('liste.notification')}}">
                          <strong>Voir toutes les notifications</strong>
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
          {{ $slot }}
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="footer">
			<div class="container-fluid">
				<div class="row text-muted">
					<div class="col-12 text-center">
						<p class="mb-0">
							&copy;<a class="text-muted" href="" target="_blank"><strong>Dazoantsy Technlojia</strong></a> - Réalisé par Rijaniaina Nambinintsoa
						</p>
					</div>
				</div>
			</div>
		</footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/admin/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('assets/admin/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('assets/admin/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('assets/admin/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('assets/admin/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('assets/admin/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('assets/admin/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('assets/admin/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('assets/admin/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<!-- Bootstrap Colorpicker -->
	<script src="{{ asset('assets/admin/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <!-- Switchery -->
	<script src="{{ asset('assets/admin/vendors/switchery/dist/switchery.min.js') }}"></script>
  <!-- Datatables -->
    <script src="{{ asset('assets/admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>  
  <!-- Custom Theme Scripts -->
    <script src="{{ asset('assets/admin/js/custom.min.js') }}"></script>
    <script>
      var init = parseInt(jQuery('#list-produit').attr('data-count'));
      var i = parseInt(jQuery('#list-produit').attr('data-count')) + 1;
      var html =  jQuery('#list-produit').html();
      jQuery('#add-product').click(function(){
        var shtml = html.replace(init, i).replace('['+init+']', '['+i+']').replace('['+init+']', '['+i+']');
        jQuery('#list-produit').append(shtml);
        i++;
      });
      jQuery('.supr-prod').click(function(){
        jQuery(this).parents('.item-produit').remove();
      })

    </script>
  </body>
</html>
