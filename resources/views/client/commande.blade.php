<x-app-layout>
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
            
            <form action="{{route('utiliser.coupon')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <label for="">Utiliser coupon</label>
                        <input type="text" class="form-control" placeholder="code coupon" name="code">
                    </div>
                    <div class="col-4"><button type="submit" class="btn amado-btn " style="width:30px;height:auto;padding:10px 0;margin-top:32px;line-height :1">Envoyer</button></div>
                </div>
                @if(Session::has('coupon_not'))
                    <span>{{Session::get('coupon_not')}}</span>
                @endif
                @if(Session::has('coupon_verifier'))
                    <span>{{Session::get('coupon_verifier')}}</span>
                @endif
            </form>
            <form action="{{route('commander.client')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Passer la commande</h2>
                            </div>
                            
                            @if(isset($coupon))
                                <input type="hidden" name="coupon" value="{{$coupon[0]->code}}"> 
                            @endif
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}"">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="name"  value="{{(Auth::user()) ? Auth::user()->name : ''}}" placeholder="Nom" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="prenom"   value="{{(Auth::user()) ? Auth::user()->prenom : ''}}" placeholder="Prénom" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="adresse"  placeholder="Adresse" value="{{(Auth::user()) ? Auth::user()->adresse : ''}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="phone" class="form-control"  name="telephone"  placeholder="Numéro Téléphone" value="{{(Auth::user()) ? Auth::user()->telephone : ''}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="number" class="form-control mb-3" name="cin"  placeholder="Numéro CIN" value="{{(Auth::user()) ? Auth::user()->cin : ''}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="email"  placeholder="email" value="{{(Auth::user()) ? Auth::user()->email : ''}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea class="form-control" placeholder="Ecrivez quelques notes ex : couleur du produit" name="note"></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            @php
                                    $total = 0;
                            @endphp
                            @foreach($produits as $key=>$produit )
                                @php
                                    $total = $total + (intval($produit['produit']->prix)*intval($produit['quantite']));
                                @endphp
                            @endforeach
                            @php
                                if(isset($coupon)){
                                    $reduction = $total * intval($reduction) / 100;
                                }
                            @endphp
                            <h5>Total à Payer</h5>
                            <ul class="summary-table">
                                <li><span>Sous-total :</span> <span>{{number_format($total,2,","," ")}} Ariary</span></li>
                                <li><span>Livraison :</span> <span>Gratuit</span></li>
                                @if(isset($coupon))
                                    @php
                                        $total = $total - $reduction;
                                    @endphp
                                    <li><span>Réduction :</span> <span>{{number_format($reduction,2,","," ")}} Ariary</span></li>
                                @endif
                                <li><span>Prix Total :</span> <span>{{number_format($total,2,","," ")}} Ariary</span></li>
                            </ul>
                            <div class="row">
                                <input type="checkbox" name="" id="termes">
                                <button data-toggle="modal" class="condition" type="button" data-target="#exampleModalCenter" style="background :none;border:none;color:gray;cursor:pointer;margin-left:7px">J'accepte les Termes & Conditions</button>
                            </div>
                            <div class="cart-btn mt-100">
                                <button class="btn amado-btn w-100 disabled" id="passer" type="submit" data-toggle="tooltip" data-original-title="Passer la commande">Commander</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
</x-app-layout>