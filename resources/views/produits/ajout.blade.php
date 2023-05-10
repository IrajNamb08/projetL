<x-admin-layout>
        <div class="x_panel text-center">
            <div class="x_title">
                <h1>Ajout Produits</h1>
            </div>
            @if(Session::has('produit_creer'))
                <span>{{Session::get('produit_creer')}}</span>
            @endif
            <div class="x_content">
                <form action="{{ route('creer.produit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="nom du produit" name="nom" required>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" placeholder="quantité du produit" name="quantite" required>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" placeholder="prix du produit" name="prix" required>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="col-md-6 x_panel">
                            <div class="x_title">Ajouter des images du produit</div>
                            <input type="file" class="form-control" name="produit_image[]" id="" multiple>
                        </div>
                        <div class="col-md-6">
                            <textarea name="description" placeholder="Entrer la description ex: RAM..." class="form-control" id="" cols="30" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="entrer la reference " name="reference" required>
                        </div>
                        <div id="couleur" class="col-md-6 x_panel">
                            <div class="x_title">Couleurs</div>
                            @foreach($couleurs as $couleur)
                                <input type="checkbox" class="js-switch" name="produit_couleur[]" id="" value="{{$couleur->id}}">   
                                <label for="">{{$couleur->nom}}</label>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="col-md-6 x_panel">
                            <div class="x_title">Catégorie du Produit</div>
                            <div class="x_content">
                                <select name="categories_id" id="" class="select2_single form-control" tabindex="-1">
                                    <option value=""></option>
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->categorie}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 x_panel">
                            <div class="x_title">Marque du Produit</div>
                            <div class="x_content">
                                <select name="marques_id" id="" class="select2_single form-control" tabindex="-1">
                                    <option value=""></option>
                                    @foreach($marques as $marque)
                                        <option value="{{$marque->id}}">{{$marque->marque}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button class="btn btn-primary" type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
</x-admin-layout>