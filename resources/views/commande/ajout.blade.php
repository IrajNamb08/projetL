<x-admin-layout>
        <div class="x_panel">
            <div class="x_title text-center">
                <h1>Ajout Commande</h1>
            </div>
            @if(Session::has('commande_creer'))
                <span>{{Session::get('commande_creer')}}</span>
            @endif
            <div class="x_content">
                <form action="{{ route('creer.commande')}}" method="post">
                    @csrf
                    <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title"><h5>Selectionner les commandes</h5></div>
                            <div class="x_content">                             
                                <input type="hidden">
                                <div id="list-produit" data-count="1">
                                    <div>
                                        <label for="">Produit 1</label>
                                        <select name="produit_commande[1][produit]" id="" class="select2_single form-control" tabindex="-1">
                                            <option value=""></option>
                                            @foreach($produits as $produit)
                                                <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                            @endforeach
                                        </select>
                                        <br><br>
                                        <input type="number" class="form-control" name="produit_commande[1][quantite]">
                                        <br>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-round btn-warning" id="add-product" type="button">Ajout Produit</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <textarea class="form-control" placeholder="Ecrivez quelques notes ex : couleur du produit" name="note"></textarea>
                    </div>
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title"><h5>Détail du Commande</h5></div>
                            <div class="x_content">
                                <select name="statut" id="" class="select2_single form-control" tabindex="-1">
                                    <option value="Commande réçu">Commande réçu</option>
                                    <option value="En cours de livraison">En cours de livraison</option>
                                    <option value="Commande annuler">Commande annuler</option>
                                    <option value="Commande terminer">Commande terminer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
</x-admin-layout>
