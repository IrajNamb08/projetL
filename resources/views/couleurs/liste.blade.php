<x-admin-layout>
        <div class="x_panel text-center">
            <div class="x_title">
                <h1>Liste des couleurs</h1>
            </div>
            @if(Session::has('couleur_delete'))
                <span>{{Session::get('couleur_delete')}}</span>
            @endif
            <div class="table-responsive">
                <table class="table table-striped jambo_table">
                    <thead>
                        <tr class="headings">
                            <th>ID#</th>
                            <th>Nom du couleur</th>
                            <th>Code couleur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($couleurs as $couleur)
                    <tbody>
                        <tr>
                            <td>{{ $couleur->id }}</td>
                            <td>{{ $couleur->nom }}</td>
                            <td>{{ $couleur->code }}</td>
                            <td>
                                <a href="{{route('modifier.couleur',$couleur->id)}}"><i class="fa fa-pencil-square-o"></i> Modifier</a>
                                <a href="{{route('supprimer.couleur',$couleur->id)}}"><i class="fa fa-trash"></i> Suprrimer</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
</x-admin-layout>
