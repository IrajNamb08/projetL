<x-admin-layout>
    <div class="x_panel">
        <div class="x_title text-center">
            <h1>Modifier Commande</h1>
        </div>
        @if(Session::has('commande_update'))
            <span>{{Session::get('commande_update')}}</span>
        @endif
        <div class="x_content">
            <form action="{{ route('update.commande')}}" method="post">
                @csrf
                <input type="hidden" value="{{$commande->id}}" name="id">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title"><h5>Selectionner les commandes</h5></div>
                        <div class="x_content">                             
                            <input type="hidden">
                            <div>
                                <div>
                                    @php
                                        $i = 1;
                                    @endphp
                                     @if($commande->getProduits() && !empty($commande->getProduits()))
                                        @foreach ($commande->getProduits() as $key=>$produitCommande)
                                    <div class="item-produit">
                                        <label for="">Produit {{$i}} <button class="btn btn-round btn-danger supr-prod" type="button"><i class="fa fa-trash"></i> Supprimer Produit</button> </label>
                                        <select name="produit_commande[{{$i}}][produit]" id="" class="select2_single form-control" tabindex="-1">
                                            <option value=""></option>
                                            @foreach($produits as $produit)
                                                <option value="{{$produit->id}}" {{ ($produit->id == $produitCommande['produit']->id) ? 'selected' : "" }}>{{$produit->nom}}</option>
                                            @endforeach
                                        </select>
                                        <br><br>
                                        <input type="number" class="form-control" name="produit_commande[{{$i}}][quantite]" value="{{$produitCommande['quantite']}}">
                                        <br>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp  
                                        @endforeach 
                                    @endif
                                </div>
                            </div>
                            <div id="list-produit" data-count="{{$i}}">
                                <div>
                                    <div class="item-produit">
                                        <label for="">Produit {{$i}} <button class="btn btn-round btn-danger supr-prod" type="button"><i class="fa fa-trash"></i> Supprimer Produit</button></label>
                                        <select name="produit_commande[{{$i}}][produit]" id="" class="select2_single form-control" tabindex="-1">
                                            <option value=""></option>
                                            @foreach($produits as $produit)
                                                <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                            @endforeach
                                        </select>
                                        <br><br>
                                        <input type="number" class="form-control" name="produit_commande[{{$i}}][quantite]">
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-round btn-warning" id="add-product" type="button">Ajout Produit</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">Note du client</div>
                        <div class="x_content">
                            <textarea class="form-control" name="" id="" cols="30" rows="2" disabled>{{$commande->note}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title"><h5>Détail du Commande</h5></div>
                        <div class="x_content">
                            <select name="statut" id="" class="select2_single form-control" tabindex="-1">
                                <option value="Commande réçu" {{ ($commande->statut == 'Commande réçu') ? 'selected' : "" }}>Commande réçu</option>
                                <option value="En cours de livraison" {{ ($commande->statut == 'En cours de livraison') ? 'selected' : "" }}>En cours de livraison</option>
                                <option value="Commande annuler" {{ ($commande->statut == 'Commande annuler') ? 'selected' : "" }}>Commande annuler</option>
                                <option value="Commande terminer" {{ ($commande->statut == 'Commande terminer') ? 'selected' : "" }}>Commande terminer</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <input type="text" class="form-control" disabled value="{{$commande->prix . ' ' . 'Ariary'}}">
                <br><button class="btn btn-primary" type="submit">Enregistrer</button>
            </form>
            <br>
            <form action="" method="POST">
                <input type="hidden" name="" value="{{$commande->user_id}}">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">Message au client {{$commande->getUsers()}}</div>
                        <div class="x_content">
                            <textarea class="form-control" name="" id="" cols="30" rows="2"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</x-admin-layout>
