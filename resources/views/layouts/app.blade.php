<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Favicon  -->
        <link rel="icon" href="{{ asset('assets/favicon.png') }}">
          <!-- Core Style CSS -->
        <link rel="stylesheet" href="{{ asset('assets/front/css/core-style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
        <style>
            .disabled{
                cursor: not-allowed;
            }
            .condition:hover{
                text-decoration: underline!important;
                color: #fbb710!important;
            }
        </style>
    </head>
    
<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="{{route('rechercher')}}" method="post">
                            @csrf
                            <input type="search" name="recherche" id="search" placeholder="Entrez votre recherche...">
                            <button type="submit"><img src="{{ asset('assets/front/images/core-img/search.png') }}" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <img src="{{ asset('assets/logo.png') }}" alt="" style="max-width: 100%;padding:5px;">
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            @include('layouts.navclient')
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        
        {{ $slot }}
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        @include('layouts.footerclient')
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{ asset('assets/front/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/front/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assets/front/js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('assets/front/js/active.js') }}"></script>
     <!-- Login js -->
    <script src="{{ asset('assets/front/js/login.js') }}"></script>
    <script>
        jQuery('.filtre').change(function(){
            jQuery(this).parents('form').submit();
        })
    </script>
    <script>
        jQuery('#termes').change(function(){
            if (jQuery(this).is(':checked')) {
                jQuery('#passer').removeClass('disabled');
            } else {
                jQuery('#passer').addClass('disabled');
            }
        })
    </script>

</body>
 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="text-transform: uppercase;align:center">CONDITIONS générales DE VENTES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
    </div>
    </div>
</div>
</html>
