<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Liste des clients</h1>
        </div>
        @if(Session::has('utilisateur_delete'))
            <span>{{Session::get('utilisateur_delete')}}</span>
        @endif
        <div class="table-responsive">
            <table class="table table-striped jambo_table">
                <thead>
                    <tr class="headings">
                        <th>Nom</th>
                        <th>Tel</th>
                        <th>Adresse</th>
                        <th>N°CIN</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                @if(!$user->is_admin())
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div><i class="material-icons opacity-10"></i></div>
                                    <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">{{ $user->name }} {{ $user->prenom }}</h6>
                                    <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                         </td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->adresse }}</td>
                            <td>{{ $user->cin }}</td>
                            <td>
                                <a href="{{route('voir.user',$user->id)}}"><i class="fa fa-eye"></i> Voir</a>
                                <a href="{{route('suppr.user',$user->id)}}"><i class="fa fa-trash"></i> Suprrimer</a>
                            </td>
                        </tr>
                    </tbody>
                @endif
                @endforeach
            </table>
        </div>
    </div>
</x-admin-layout>