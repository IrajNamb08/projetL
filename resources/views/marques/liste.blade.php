<x-admin-layout>
    <div class="col-md-12 col-sm-12">
        <div class="x_panel text-center">
            <div class="x_title">
                <h1>Liste des marques</h1>
            </div>
        @if(Session::has('marque_delete'))
            <span>{{Session::get('marque_delete')}}</span>
        @endif
        <div class="class="table-responsive"">
            <table class="table table-striped jambo_table">
                <thead>
                    <tr class="headings">
                        <th>ID#</th>
                        <th>Nom de la marque</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($marques as $marque)
                <tbody>
                    <tr>
                        <td>{{ $marque->id }}</td>
                        <td>{{ $marque->marque }}</td>
                        <td>
                            <a href="{{ route('modifier.marque', $marque->id) }}"><i class="fa fa-pencil-square-o"></i> Modifier</a> 
                            <a href="{{ route('supprimer.marque', $marque->id) }}"><i class="fa fa-trash"></i> Suprrimer</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        </div>
    </div>
</x-admin-layout>
   