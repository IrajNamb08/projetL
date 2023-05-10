<x-app-layout>
    <div class="shop_sidebar_area">
        <form action="{{route ('filtre')}}" method="post">
            @csrf
            <!-- ##### Catégories ##### -->
            @include('client.categorie')

            <!-- ##### Catégories ##### -->

            <!-- ##### Marques ##### -->
            @include('client.marque')

            <!-- ##### Marques ##### -->

            <!-- ##### Couleurs ##### -->
            {{-- @include('client.couleur') --}}

            <!-- ##### Couleurs ##### -->
        </form>
        
        
    </div>

    <div class="amado_product_area section-padding-100">
        <div class="container-fluid">

            <div class="row">
                @foreach($produits as $produit)
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                @if($produit->getImages() && !empty($produit->getImages()))
                                    <img src="{{$produit->getImages()[0]->url}}" alt="{{$produit->nom}}">
                                    @if(isset($produit->getImages()[1]))
                                        <img style="width: 100%;height:100%;object-fit:contain;background:white;" class="hover-img" src="{{$produit->getImages()[1]->url}}" alt=""> 
                                    @endif
                                @endif
                                <!-- Hover Thumb -->
                               
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">{{number_format($produit->prix,2,","," ")}} Ariary</p>
                                    <a href="{{ route('detail', $produit->id) }}">
                                        <h6>{{$produit->nom}}</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                            </div>
                        </div>
                    </div> 
                @endforeach

        </div>
    </div>
    </div>
</x-app-layout>