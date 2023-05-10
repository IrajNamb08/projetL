<x-admin-layout>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel text-center">
            <div class="x_title">
                <h1>Liste des catégories</h1>
            </div>
            @if(Session::has('categorie_delete'))
                <span>{{Session::get('categorie_delete')}}</span>
            @endif
            <div class="table-responsive">
                <table class="table table-striped jambo_table">
                    <thead>
                        <tr class="headings">
                            <th class="column-title">ID#</th>
                            <th class="column-title">Nom de la catégorie</th>
                            <th class="column-title">Action</th>
                        </tr>
                    </thead>
                    @foreach($categories as $categorie)
                    <tbody>
                        <tr>
                            <td>{{$categorie->id}}</td>
                            <td>{{$categorie->categorie}}</td>
                            <td>
                                <a href="{{ route('modifier.categorie', $categorie->id) }}"><i class="fa fa-pencil-square-o"></i> Modifier</a>
                                <a href="{{ route('supprimer.categorie', $categorie->id) }}"><i class="fa fa-trash"></i> Suprrimer</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    
        
</x-admin-layout>
<li><a><i class="fa fa-folder"></i> Catégorie <span class="fa fa-chevron-down"></span></a>

