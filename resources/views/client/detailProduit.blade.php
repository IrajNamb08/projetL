<x-app-layout>
      <!-- Product Details Area Start -->
      <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @php
                                    $i = 0;
                                @endphp
                                @if($produits->getImages() && !empty($produits->getImages()))
                                    @foreach($produits->getImages() as $image)
                                    <li class="{{($i == 0) ? 'active' : ''}}" data-target="#product_details_slider" data-slide-to="{{$i}}" style="background-image: url({{$image->url}});">
                                    </li>   
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                @endif
                                
                            </ol>
                            <div class="carousel-inner">
                                @php
                                    $j = 0;
                                @endphp
                                @if($produits->getImages() && !empty($produits->getImages()))
                                @foreach($produits->getImages() as $image)
                                    <div class="carousel-item {{($j == 0) ? 'active' : ''}}">
                                        <a class="gallery_img" href="{{$image->url}}">
                                            <img style="height: 350px; object-fit:contain;" class="d-block w-100" src="{{$image->url}}" alt="First slide">
                                        </a>
                                    </div>
                                @php
                                    $j++;
                                @endphp
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">{{ number_format($produits->prix,2,","," ")}} Ariary</p>
                            <a href="product-details.html">
                                <h6>{{$produits->nom}}</h6>
                            </a>
                            <!-- Avaiable -->
                            <p class="avaibility"><i class="fa fa-circle {{($produits->quantite <= 0) ? 'text-danger' : ''}}"></i> {{($produits->quantite <= 0) ? 'Indisponible' : 'Disponible'}}</p>
                        </div>

                        <div class="short_overview my-5">
                            <h5>Couleurs Disponibles</h5>
                            <ul style="display:flex;">
                                @foreach($couleurs as $couleur)
                                    @if((in_array($couleur->id,$allCouleurs)))
                                            <li>{{'.' . ' '. $couleur->nom}}</li>
                                    @endif
                                    
                                @endforeach
                            </ul>
                            <p>{{$produits->description}}</p>
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix" method="post" action="{{route('ajout.panier')}}">
                            @csrf
                            @if(($produits->quantite > 0))
                                <div class="cart-btn d-flex mb-50">
                                    <input type="hidden" name="id" value="{{$produits->id}}">
                                    <p>Quantité</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="{{$produits->quantite}}" name="quantite" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <button type="submit" name="addtocart" value="5" class="btn amado-btn">Ajouter au panier</button>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
</x-app-layout>