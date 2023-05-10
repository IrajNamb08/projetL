<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Modifier Produits</h1>
        </div>
        @if(Session::has('produit_update'))
            <span>{{Session::get('produit_update')}}</span>
        @endif
        <div class="x_content">
            <form action="{{ route('update.produit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $produits->id }}">
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <input type="text" value="{{$produits->nom}}" class="form-control" placeholder="nom du produit" name="nom" required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" value="{{$produits->quantite}}" class="form-control" placeholder="quantité du produit" name="quantite" required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" value="{{$produits->prix}}" class="form-control" placeholder="prix du produit" name="prix" required>
                    </div>
                </div>
               <br><br><br>
                <div class="col-md-12 x_panel">
                    <div class="x_title">Les images du produits</div>
                    <div class="x_content">
                        @if(Session::has('image_delete'))
                        <span>{{Session::get('image_delete')}}</span>
                        @endif
                        <br>
                        @if($produits->getImages() && !empty($produits->getImages()))
                            @foreach($produits->getImages() as $image )
                                <img src="{{$image->url}}" alt="" style="height: 100px;width:100px;object-fit:cover">
                                <a href="{{route ('supprimerImage.produit', $image->id)}}"><i class="fa fa-trash"></i>supprimer image</a>   
                            @endforeach
                        @endif
                    </div>
                </div>
                <br><br>
                <div class="col-md-12" style="margin-top: 20px">
                    <div class="col-md-6 x_panel">
                        <div class="x_title">Ajouter des images du produit</div>
                        <input type="file" class="form-control" name="produit_image[]" id="" multiple>
                    </div>
                    <div class="col-md-6">
                        <textarea name="description" placeholder="Entrer la description ex: RAM..." class="form-control" id="" cols="30" rows="3" required>{{$produits->description}}</textarea>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 20px">
                    <div class="col-md-6">
                        <input type="text" class="form-control" value="{{$produits->reference}}" placeholder="entrer la reference " name="reference" required>
                    </div>
                    <div id="couleur" class="col-md-6 x_panel">
                        <div class="x_title">Couleurs</div>
                        @foreach($couleurs as $couleur)
                            <input type="checkbox" class="js-switch" name="produit_couleur[]" id="" value="{{$couleur->id}}" @if(in_array($couleur->id,$allCouleurs))
                            checked
                            @endif>   
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
                                    <option value="{{$categorie->id}}" {{ ($categorie->id == $produits->categories_id) ? 'selected' : "" }}>{{$categorie->categorie}}</option>
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
                                    <option value="{{$marque->id}}" {{ ($marque->id == $produits->marques_id) ? 'selected' : "" }}>{{$marque->marque}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <br><br>
                <button class="btn btn-success btn-lg" type="submit">Modifier</button>
            </form>
        </div>
    </div>
</x-admin-layout>