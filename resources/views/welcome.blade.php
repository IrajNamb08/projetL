<x-app-layout>
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">

        <!-- Single Catagory -->
        @foreach($produits as $produit)
        <div class="single-products-catagory clearfix">
            <a href="{{ route('detail', $produit->id) }}">
                @if($produit->getImages() && !empty($produit->getImages()))
                    <img src="{{$produit->getImages()[0]->url}}" alt="{{$produit->nom}}">
                @endif
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>{{number_format($produit->prix,2,","," ")}} Ariary</p>
                    <h4>{{$produit->nom}}</h4>
                </div>
            </a>
        </div>
        @endforeach
        
    </div>
</div>
</x-app-layout>