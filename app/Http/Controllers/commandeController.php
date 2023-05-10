<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\testMail;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\produitCommande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class commandeController extends Controller
{
    public function ajout()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $produits=Produit::all();
        return view('commande.ajout', compact('produits'));
    }
    public function enregistrer(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $produits = [];
        
        $commande_id = Commande::create([
            'user_id' => Auth::user()->id,
            "statut" => $request->statut,
            "note"=> (isset($request->note)) ?$request->note : ' ',
            "prix" => 0
            ]
        )->id;
        if($request->produit_commande){
            $prix=0;
            // dd($request->produit_commande);
            foreach($request->produit_commande as $produit){
                if($produit['produit']){
                    $produit_commande = [
                        "commande_id" => $commande_id,
                        "produit_id" => $produit['produit'],
                        "quantite" => $produit['quantite'],
                    
                    ];
                    $produitCommandes = produitCommande::create($produit_commande);
                    $prix = $prix + $produitCommandes->getPrix();
                }
                
            }
        }
        Commande::where('id', $commande_id)->update([
            "prix" => $prix,
        ]);
        return back()->with("commande_creer", 'commande ajouté');
    }
    public function listes()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $commandes= Commande::all();
        return view('commande.liste',[
            "commandes" => $commandes
        ]);
    }
    public function modifier($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $produit = Produit::all();
        $commande = Commande::find($id);
        $data = array(
            "produits" => $produit,
            "commande" => $commande
        );
        return view('commande.modifier', $data);
    }
    public function update(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        if($request->produit_commande){
            produitCommande::where('commande_id',$request->id)->delete();
            $prix=0;
            
            foreach($request->produit_commande as $produit){
                if(isset($produit['produit'])){
                    $produit_commande = [
                        "commande_id" => $request->id,
                        "produit_id" => $produit['produit'],
                        "quantite" => $produit['quantite']
                    ];
                    $produitCommandes = produitCommande::create($produit_commande);
                    $prix = $prix + $produitCommandes->getPrix();
                }
                
            }
        }
        Commande::where('id',$request->id)->update([
            "statut"=> $request->statut,
            "prix" => $prix
        ]);
        return back()->with('commande_update', 'commande modifié');
    }
    public function supprimer($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Commande::where('id',$id)->delete();
        return back()->with('commande_delete', 'commande supprimé');
    }
    public function envoiEmail()
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
        Mail::to('nambinintsoarijaniaina08@gmail.com')->send(new testMail());
        return view ('dashboard',compact('users','produits','commandes','lastProduits','lastCommandes','lastUsers'));

    }
    
}
