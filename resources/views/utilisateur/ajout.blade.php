<x-admin-layout>
    <div class="x_panel text-center">
        <div class="x_title">
            <h1>Ajout d'un utilisateur</h1>
        </div>
        <div class="x_content">
            <form action="{{route('ajouter.utilisateur')}}" method="post">
                @csrf
                <div class="row col-md-12">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="nom" name="name" required >
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="prénom" name="prenom" required >
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="adresse" name="adresse" required >
                    </div>
                </div>
               <br><br><br>
               <div class="row col-md-12">
                    <div class="col-md-4">
                        <input type="number" class="form-control" placeholder="numéro télephone" name="telephone" required >
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-control" placeholder="Numéro CIN" name="cin" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="email" name="email" required>
                    </div>
                </div>
                <br><br><br>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <input id="password" 
                        type="password"
                        name="password" class="form-control" autocomplete="new-password" placeholder="Mot de passe"/>
                    </div>
                    <div class="col-md-6">
                        <input id="password_confirmation" 
                        type="password" class="form-control"
                        name="password_confirmation"  placeholder="Mot de passe confirmé" />
                    </div>
                </div>
                <br><br><br>
                    <div class="">
                        <input type="checkbox" class="js-switch" name="administrateur" id="admin" value="1">   
                        <label for="admin">Administrateur</label>
                    </div>     
                <br><br><br>
                <button class="btn btn-success btn-lg" type="submit">Enregistrer</button>
            </form>
        </div>
    </div>
</x-admin-layout>