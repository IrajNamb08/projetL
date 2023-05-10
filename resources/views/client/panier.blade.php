<x-app-layout>
    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                @if(!empty($produits))
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Panier</h2>
                    </div>
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nom</th>
                                    <th>Prix Unitaire</th>
                                    <th>Prix Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                               
                                     @foreach($produits as $key=>$produit )
                                        <tr>
                                            <td class="cart_product_img">
                                                <a href="{{route('detail',$produit['produit']->id)}}"><img src="{{$produit['produit']->getImages()[0]->url}}" alt="{{$produit['produit']->nom}}"></a>
                                            </td>
                                            <td class="cart_product_desc">
                                                <h5>{{$produit['produit']->nom}}</h5>
                                                <a href="{{route('supprimer.panier',$key)}}"><i class="fa fa-trash"></i> Suprrimer</a>
                                            </td>
                                            <td class="price">
                                                <span>{{$produit['produit']->prix}} Ar <b>x{{$produit['quantite']}}</b></span>
                                            </td>
                                            <td>
                                               <b>{{(intval($produit['produit']->prix)*intval($produit['quantite']))}} Ariary</b>
                                            </td>
                                        </tr>
                                        @php
                                            $total = $total + (intval($produit['produit']->prix)*intval($produit['quantite']));
                                        @endphp
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Total à Payer</h5>
                        <ul class="summary-table">
                            <li><span>Livraison :</span> <span>Gratuit</span></li>
                            <li><span>Prix Total :</span> <span>{{number_format($total,2,","," ")}} Ariary</span></li>
                        </ul>
                        <div class="cart-btn mt-100">
                            <a href="{{route('commande')}}" class="btn amado-btn w-100">Commander</a>
                        </div>
                    </div>
                </div>
                    @else
                        <p>Aucun produit pour l'instant</p>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>
