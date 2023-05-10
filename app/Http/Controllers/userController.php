<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function save(Request $request)
    {
        // if(!Gate::allows('access-admin')){
        //     return redirect(route('profil'));
        // }
        return app('App\Http\Controllers\Auth\RegisteredUserController')->store($request);
    }
    public function liste()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $users = User::all();
        return view('utilisateur.liste',compact("users"));
    }
    public function voir(int $id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $user = User::find($id);
        return view('utilisateur.voir', compact('user'));
    }
    public function add_user()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }        
        return view('auth.register');
    }
    public function profil (int $id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $user = User::find($id);
        return view('utilisateur.modifier', compact('user'));
    }
    public function update(Request $post)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $arg = array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cin' => ['required', 'string', 'min:12', 'max:12']
        );
        if($post->password != ''){
            $arg['password'] = [ 'confirmed', Rules\Password::defaults()];
        }
        $post->validate($arg);
        $user = User::find($post->id_user);
        if($post->name){
            $user->name = $post->name;
        }
        if($post->prenom){
            $user->prenom = $post->prenom;
        }
        if($post->adresse){
            $user->adresse = $post->adresse;
        }
        if($post->telephone){
            $user->telephone = $post->telephone;
        }
        if($post->cin){
            $user->cin = $post->cin;
        }
        if($post->email){
            $user->email = $post->email;
        }
        if($post->password != ''){
            if($post->password == $post->password_confirmation){
                $user->password = Hash::make($post->password);
            }
        }
        $user->save();
        return redirect(url()->previous());
    }
    public function suppr_user(int $id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        User::where('id', $id)->delete();
        return back()->with('utilisateur_delete', 'utilisateur supprimé');
    }
    public function inscription(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cin' => ['required', 'string', 'min:12', 'max:12']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'prenom'=> $request->prenom,
            'adresse'=>$request->adresse,
            'telephone'=>$request->telephone,
            'cin'=>$request->cin
        ]);
        return redirect(route('liste.utilisateur'));
        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }
    public function admin()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $users = User::all();
        $produits = Produit::all();
        $commandes = Commande::all();
        $lastProduits = Produit::all()->take(-4);
        $lastCommandes = Commande::all()->take(-4);
        $lastUsers = User::all()->take(-4);
        return view ('dashboard',compact('users','produits','commandes','lastProduits','lastCommandes','lastUsers'));
    }
    public function ajout()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        return view('utilisateur.ajout');
    }
    public function ajouter(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'cin' => ['required', 'string', 'min:12', 'max:12']
        ]);
        $donnee = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'prenom'=> $request->prenom,
            'adresse'=>$request->adresse,
            'telephone'=>$request->telephone,
            'cin'=>$request->cin,
            ];
        if(isset($request->administrateur)){
            $donnee['admin'] = 1;
        }
        $user = User::create($donnee);
        $users = User::all();
        return view('utilisateur.liste',compact("users"));
    }
}
