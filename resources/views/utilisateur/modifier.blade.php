<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Modifier le profil de l'utilisateur</h1>
        </div>
        <div class="x_content">
            <form action="{{ route('update.user')}}" method="post">
                @csrf
                <input type="hidden" name="id_user" value="{{ $user->id }}">
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="nom" name="name" required 
                        @if(isset($user))
                        value="{{$user->name}}"
                        @else
                            value="{{old('name')}}"
                        @endif>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="prénom" name="prenom" required 
                        @if(isset($user))
                        value="{{$user->prenom}}"
                        @else
                            value="{{old('prenom')}}"
                        @endif>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="adresse" name="adresse" required 
                        @if(isset($user))
                            value="{{$user->adresse}}"
                        @else
                            value="{{old('adresse')}}"
                        @endif>
                    </div>
                </div>
               <br><br><br>
               <div class="row col-md-12">
                    <div class="col-md-4">
                        <input type="number" class="form-control" placeholder="nom du produit" name="telephone" required 
                        @if(isset($user))
                            value="{{$user->telephone}}"
                        @else
                            value="{{old('telephone')}}"
                        @endif>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" placeholder="Numéro CIN" name="cin" required 
                        @if(isset($user))
                        value="{{$user->cin}}"
                        @else
                            value="{{old('cin')}}"
                        @endif>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="email" name="email" required 
                        @if(isset($user))
                        value="{{$user->email}}"
                        @else
                            value="{{old('email')}}"
                        @endif>
                    </div>
                </div>
                <br><br><br>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <input id="password" 
                        type="password"
                        name="password" class="form-control"
                        {{ isset($user) ? '' : 'required' }}  autocomplete="new-password" placeholder="Mot de passe"/>
                    </div>
                    <div class="col-md-6">
                        <input id="password_confirmation" 
                        type="password" class="form-control"
                        name="password_confirmation" {{ isset($user) ? '' : 'required' }} placeholder="Mot de passe confirmé" />
                    </div>
                </div>
                <br><br><br>
                <button class="btn btn-success btn-lg" type="submit">Mettre à jour</button>
            </form>
        </div>
    </div>
</x-admin-layout>