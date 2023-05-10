<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Ajout Categories</h1>
        </div>
        @if(Session::has('categorie_creer'))
            <span>{{Session::get('categorie_creer')}}</span>
        @endif
        <div class="x_content">
            <form action="{{ route('creer.categorie')}}" method="post" class="">
                @csrf
                <input type="text" style="margin: auto;
                float: none;" class="form-control col-md-4 text-center" placeholder="nom de la catégorie" name="categorie" required>
                <br>
                <button class="btn btn-primary" type="submit" data-toggle="tooltip" data-original-title="Ajouter une catégorie">Enregistrer</button>
            </form>
        </div>
    </div>
    
</x-admin-layout>