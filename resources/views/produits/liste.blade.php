<x-admin-layout>
    <div class="x_panel">
        <div class="x_title text-center">
            <h1>Liste des produits</h1>
        </div>
        @if(Session::has('produit_delete'))
            <span>{{Session::get('produit_delete')}}</span>
        @endif
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <p class="text-muted font-13 m-b-30 x_title">
                        Exporter les fichiers.
                      </p>
                      <table id="datatable-buttons" class="table table-striped table-bordered jambo_table text-center" style="width:100%">
                        <thead>
                          <tr>
                            <th>ID#</th>
                            <th>Nom du produit</th>
                            <th>Prix</th>
                            <th>Quantite</th>
                            <th>Référence</th>
                            <th>Marques</th>
                            <th>Catégories</th>
                            <th>Couleur disponible</th>
                            <th>Images</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($produits as $produit)
                          <tr>
                            <td>{{$produit->id}}</td>
                            <td>{{$produit->nom}}</td>
                            <td>{{number_format($produit->prix,2,","," ") . 'Ar'}}</td>
                            <td>{{$produit->quantite}}</td>
                            <td>{{$produit->reference}}</td>
                            <td>{{$produit->getMarque()}}</td>
                            <td>{{$produit->getCategorie()}}</td>
                            <td>
                                
                                @if($produit->getCouleurs() && !empty($produit->getCouleurs()))
                                    @foreach($produit->getCouleurs() as $couleur)
                                        {{$couleur->nom . ','}}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if($produit->getImages() && !empty($produit->getImages()))
                                <img src="{{$produit->getImages()[0]->url}}" alt="" style="height: 100px;width:100px;object-fit:cover">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('modifier.produit', $produit->id) }}"><i class="fa fa-pencil-square-o"></i> Modifier</a>
                                <a href="{{ route('supprimer.produit', $produit->id) }}"><i class="fa fa-trash"></i> Suprrimer</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

    