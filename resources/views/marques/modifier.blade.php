<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Modifier Marques</h1>
        </div>
        @if(Session::has('marque_update'))
            <span>{{Session::get('marque_update')}}</span>
        @endif
        <div class="x_content">
            <form action="{{ route('update.marque')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $marques->id }}">
                <input type="text"  style="margin: auto;
                float: none;" class="form-control col-md-4 text-center" placeholder="nom de la catégorie" name="marque" value="{{ $marques->marque }}">
                <br><button class="btn btn-success btn-lg" type="submit"">Modifier</button>
            </form>
        </div>
    </div>
</x-admin-layout>
