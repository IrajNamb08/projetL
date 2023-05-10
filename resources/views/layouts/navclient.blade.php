<!-- Close Icon -->
<div class="nav-close">
    <i class="fa fa-close" aria-hidden="true"></i>
</div>
<!-- Logo -->
<div class="logo">
    <img src="{{ asset('assets/logo.png') }}" alt="" style="max-width: 100%;padding:5px;">
</div>
<!-- Amado Nav -->
<nav class="amado-nav">
    <ul>
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{route ('home')}}">Accueil</a></li>
        <li class="{{ Request::is('boutique*') ? 'active' : '' }}"><a href="{{route ('boutique')}}">Boutique</a></li>
        <li class="{{ Request::is('commande*') ? 'active' : '' }}"><a href="{{route ('commande')}}">Commande</a></li>
    </ul>
</nav>
<!-- Button Group -->
<div class="amado-btn-group mt-30 mb-100">
    @if(Auth::user())
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <a class="btn amado-btn mb-15"  href="javascript:;" onclick="event.preventDefault();
            this.closest('form').submit();"> Deconnexion</a>
        </form>
    @else
        <a href="{{route('login')}}" class="btn amado-btn mb-15">
            Connexion
        </a>
    @endif 
    
</div>
<!-- Cart Menu -->
@php
    global $request;
    // $request->session()->forget('panier');
    if ($request->session()->get('panier')) {
        $qt = $request->session()->get('panier');
    }else{
        $qt = array();
    }
    
@endphp
<div class="cart-fav-search mb-100">
    <a href="{{route('panier')}}" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Panier <span>({{sizeOf($qt)}})</span></a>
    <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Rechercher</a>
</div>

