<x-admin-layout>
        <div class="x_panel text-center">
            <div class="x_title">
                <h1>Ajout Couleur</h1>
            </div>
            @if(Session::has('couleur_creer'))
            <span>{{Session::get('couleur_creer')}}</span>
            @endif
            <div class="x_content">
                <form action="{{ route('couleur.creer')}}" method="post">
                    @csrf
                    <input type="text" type="text" style="margin: auto;
                    float: none;" class="form-control col-md-4 text-center" placeholder="nom du couleur" name="nom">
                    <br>
                      <div class="form-group row">
                          <div style="margin: auto;
                          float: none;" class="input-group demo2 col-md-4 text-center">
                                <input type="text" value="#000"  class="form-control" name="code" />
                                <span class="input-group-addon"><i></i></span>
                           </div>
                      </div>
                    <br><br><button class="btn btn-primary" type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
</x-admin-layout>
