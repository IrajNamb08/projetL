<x-guest-layout>
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Identifiez-Vous</h1>
                <div>
                    <input type="email" name="email" :value="old('email')" class="form-control" placeholder="Email" required="" />
                </div>
                <div>
                    <input  type="password" name="password" class="form-control" placeholder="Password" required="" />
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Connexion</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                <p class="change_link">N'est pas membre?
                    <a href="#signup" class="to_register"> Créer une compte </a>
                </p>

                <div class="clearfix"></div>
                <br />

                    <div>
                        <h1>Dazoantsy Technlojia</h1>
                        <p>&copy;<a class="text-muted" href="" target="_blank"><strong>Dazoantsy Technlojia</strong></a> - Réalisé par Rijaniaina Nambinintsoa</p>
                    </div>
                </div>
            </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('inscription.client') }}">
                    @csrf
                    <h1>Créer une compte</h1>
                    <div>
                        <input type="text" name="name"  class="form-control" placeholder="Nom" required="" />
                    </div>
                    <div>
                        <input type="texgt" name="prenom" class="form-control" placeholder="Prénom" required="" />
                    </div>
                    <br>
                    <div>
                        <input type="text" name="adresse" class="form-control" placeholder="Adresse" required="" />
                    </div>
                    <div>
                        <input type="text" name="telephone" class="form-control" placeholder="numéro télephone" required="" />
                    </div>
                    <div>
                        <input type="number" name="cin" class="form-control" placeholder="numéro CIN" required="" />
                    </div>
                    <br>
                    <div>
                        <input type="email" name="email"  class="form-control" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="" />
                    </div>
                    <div>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation mot de passe" required="" />
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                    <p class="change_link">Déja membre ?
                        <a href="#signin" class="to_register"> Connexion </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1> Dazoantsy Technlojia</h1>
                        <p>&copy;<a class="text-muted" href="" target="_blank"><strong>Dazoantsy Technlojia</strong></a> - Réalisé par Rijaniaina Nambinintsoa</p>
                    </div>
                    </div>
                </form>
            </section>
        </div>
        </div>
    </div>
</x-guest-layout>
