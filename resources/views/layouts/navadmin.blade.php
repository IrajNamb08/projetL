<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Accueil <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('admin')}}">Dashboard</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-folder"></i> Catégorie <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route ('ajout.categorie')}}">Ajouter</a></li>
            <li><a href="{{ route('liste.categorie') }}">Listes</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-briefcase"></i> Marque <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route ('ajout.marque')}}">Ajouter</a></li>
            <li><a href="{{ route('liste.marque') }}">Listes</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-thumb-tack"></i> Couleur <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route ('ajout.couleur')}}">Ajouter</a></li>
            <li><a href="{{route ('liste.couleur')}}">Listes</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-product-hunt"></i> Produits <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route ('ajout.produit')}}">Ajouter</a></li>
            <li><a href="{{route ('liste.produit')}}">Listes</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-cart-plus"></i> Commande <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route ('ajout.commande')}}">Ajouter</a></li>
            <li><a href="{{route ('liste.commande')}}">Listes</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-money"></i> Coupon <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('ajout.coupon')}}">Ajouter</a></li>
            <li><a href="{{route('liste.coupon')}}">Listes</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-users"></i> Utilisateur <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('ajout.utilisateur')}}">Ajouter</a></li>
              <li><a href="{{route('liste.utilisateur')}}">Listes</a></li>
            </ul>
          </li>
      </ul>
    </div>
  </div>