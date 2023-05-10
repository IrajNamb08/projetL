<x-admin-layout>
        <div class="x_panel text-center">
            <div class="x_title">
                <h1>Modifier Couleurs</h1>
            </div>
            @if(Session::has('couleur_update'))
                <span>{{Session::get('couleur_update')}}</span>
            @endif
            <div class="x_content">
                <form action="{{ route('update.couleur')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $couleurs->id }}">
                    <input type="text" type="text" style="margin: auto;
                    float: none;" class="form-control col-md-4 text-center" value="{{ $couleurs->nom }}" placeholder="nom du couleur" name="nom">
                     <br>
                     <div class="form-group row">
                        <div style="margin: auto;
                        float: none;" class="input-group demo2 col-md-4 text-center">
                              <input type="text" value="#000"  class="form-control" value="{{ $couleurs->code }}" name="code" />
                              <span class="input-group-addon"><i></i></span>
                         </div>
                    </div>
                    <br><button class="btn btn-success btn-lg" type="submit">Modifier</button>
                </form>
            </div>
        </div>
</x-admin-layout>