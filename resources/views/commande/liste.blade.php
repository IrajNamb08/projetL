<x-admin-layout>
    <div class="x_panel">
        <div class="x_title text-center">
            <h1>Liste Commande</h1>
        </div>
        @if(Session::has('commande_delete'))
            <span>{{Session::get('commande_delete')}}</span>
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
                            <tr>
                                <th>ID</th>
                                <th>Nom du personne</th>
                                <th>date du commande</th>
                                <th>Statut</th>
                                <th>Prix à payer</th>
                                <th>Action</th>
                            </tr>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($commandes as $commande)
                            <tr>
                                <td>{{$commande->id}}</td>
                                <td>{{$commande->getUsers()}}</td>
                                <td>{{$commande->getDate()}}</td>
                                <td>{{$commande->statut}}</td>
                                <td>{{number_format($commande->prix,2,","," ") .' '.'Ariary'}}</td>
                                <td>
                                    <a href="{{ route ('modifier.commande', $commande->id)}}"><i class="fa fa-eye"></i> Voir</a>
                                    <a href="{{ route ('supprimer.commande', $commande->id)}}"><i class="fa fa-trash"></i> Suprrimer</a>
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

    