<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Modifier Catégories</h1>
        </div>
            @if(Session::has('categorie_update'))
                <span>{{Session::get('categorie_update')}}</span>
            @endif
        <div class="x_content">
            <form action="{{ route('update.categorie')}}" method="post">
                @csrf
                <input type="hidden" placeholder="nom de la catégorie" name="id" value="{{ $categories->id }}">
                <input type="text" style="margin: auto;
                float: none;" class="form-control col-md-4 text-center" placeholder="nom de la catégorie" name="categorie" value="{{ $categories->categorie }}" required>
                <br>
                <button class="btn btn-success btn-lg" type="submit" data-toggle="tooltip" data-original-title="Modifier catégorie">Modifier</button>
             </form>
        </div>
    </div>
</x-admin-layout>