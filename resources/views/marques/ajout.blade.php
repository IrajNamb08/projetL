<x-admin-layout>
        <div class="x_panel text-center">
            <div class="x_title">
                <h1>Ajout Marques</h1>
            </div>
            @if(Session::has('marque_creer'))
                <span>{{Session::get('marque_creer')}}</span>
            @endif
            <div class="x_content">
                <form action="{{ route('creer.marque')}}" method="post">
                    @csrf
                    <input type="text" style="margin: auto;
                    float: none;" class="form-control col-md-4 text-center" placeholder="nom de la marque" name="marque" >
                    @error('marque')
                        <div>{{$message}}</div>
                    @enderror
                    <br><button class="btn btn-primary" type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
</x-admin-layout>