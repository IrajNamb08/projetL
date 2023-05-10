<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Coupon;
use App\Models\Marque;
use App\Models\Couleur;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\produitCommande;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class clientControllers extends Controller
{
   public function boutique()
   {
       $categories = Categorie::all();
       $marques = Marque::all();
       $couleurs = Couleur::all();
       $produits = Produit::all();
       return view('client.boutique', compact('categories', 'marques', 'couleurs','produits'));
   }
   public function filtre(Request $request)
   {
       $categories = Categorie::all();
       $marques = Marque::all();
       $couleurs = Couleur::all();
       $cat = $request->categorie;
       $mark = $request->marque;
       $produits = Produit::when($cat, function($query, $cat){
         $query->whereIn('categories_id',$cat);
        })->when($mark, function($query, $mark){
            $query->whereIn('marques_id',$mark);
        })->get();
       $checkedCategorie = $request->categorie;
       return view('client.boutique', compact('categories', 'marques', 'couleurs','produits','request'));
   }
   public function commande()
   {
        $produits = [];
        global $request;
        if(!(Auth::user() && !empty($request->session()->get('panier')))){
            if(!(Auth::user())){
                return redirect(route('login'));
            }
            return redirect(route('panier'));
        }
            if($request->session()->get('panier')){
                foreach($request->session()->get('panier') as $key=>$item){
                    $produits[$key] = array(
                        'produit' => Produit::find($item['id_produit']),
                        'quantite' => $item['quantite']
                    );
                }
            }
       return view('client.commande',compact('produits'));
   }
   public function home()
   {
       $produits = [];
       $marques = Marque::all();
       foreach($marques as $marque){
           if(!empty($marque->getProduitInMarques()) && $marque->getProduitInMarques() ){
            foreach( $marque->getProduitInMarques() as $produit){
                $produits[] = $produit;
            }
           } 
       }
       return view('welcome',compact('produits'));
   }
   public function detail($id)
   {
        $produits = Produit::find($id);
        $couleurs = Couleur::all();
        $allCouleurs = [];
        if($produits->getCouleurs() && !empty($produits->getCouleurs())):
            foreach($produits->getCouleurs() as $couleur){
                $allCouleurs[] = $couleur->id;
            }
        endif;
        return view('client.detailProduit',compact('produits','couleurs','allCouleurs'));
   }
   public function panier()
   {
        $produits = [];
        global $request;
        if($request->session()->get('panier')){
            foreach($request->session()->get('panier') as $key=>$item){
                $produits[$key] = array(
                    'produit' => Produit::find($item['id_produit']),
                    'quantite' => $item['quantite']
                );
            }
        }
        return view('client.panier', compact('produits')); 
   }
   public function ajoutPanier(Request $request)
   {
        $p = array();
        $panier = array(
            'id_produit' => $request->id,
             'quantite' => $request->quantite
        );
        if($request->session()->has('panier')){
           $p = $request->session()->get('panier');
        }
        $p[] =  $panier;
        $request->session()->put('panier',$p);
        return redirect(route('panier'));
   }
   public function supprimerPanier($id)
   {
        $produits = [];
        global $request;
        if($request->session()->get('panier')){
            $re = $request->session()->get('panier');
            unset($re[$id]);
            $request->session()->put('panier',$re);
        }
        return back()->with('panier_delete', 'produits supprimé');
   }
   public function rechercher(Request $request)
   {
       $categories = Categorie::all();
       $marques = Marque::all();
       $couleurs = Couleur::all();
       $rech = $request->recherche;
       $produits = Produit::when($rech, function($query, $rech){
         $query->where('nom', 'like','%'.$rech.'%');
         $query->orWhere('description', 'like','%'.$rech.'%');
        })->get();
       $checkedCategorie = $request->categorie;
       return view('client.boutique', compact('categories', 'marques', 'couleurs','produits','request'));
   }
   public function inscription(Request $request)
   {
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
        
        return back();
   }
   public function commander(Request $request)
   {
        $arg = array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'cin' => ['required', 'string', 'min:12', 'max:12']
        );
        $request->validate($arg);
        $user = User::find($request->id_user);
        if($request->name){
            $user->name = $request->name;
        }
        if($request->prenom){
            $user->prenom = $request->prenom;
        }
        if($request->adresse){
            $user->adresse = $request->adresse;
        }
        if($request->telephone){
            $user->telephone = $request->telephone;
        }
        if($request->cin){
            $user->cin = $request->cin;
        }
        if($request->email){
            $user->email = $request->email;
        }
        $user->save();
       $produits = [];
       $commande_id = Commande::create([
           'user_id' => Auth::user()->id,
           "statut" => "Commande réçu",
           "prix" => 0,
           "note"=> (isset($request->note)) ?$request->note : ' '
           ]
       )->id;
            // dd($request->session()->get('panier'));
            if($request->session()->get('panier')){
                $prix=0;
                foreach($request->session()->get('panier') as $key=>$item){
                    $prod = Produit::find($item['id_produit']);
                    if(isset($prod->quantite)){
                        $prod->quantite = $prod->quantite - intval($item['quantite']);
                        $prod->save();
                    }
                    $produit_commande = [
                        "commande_id" => $commande_id,
                        "produit_id" => $item['id_produit'],
                        "quantite" => $item['quantite']
                    ];
                    $produitCommandes = produitCommande::create($produit_commande);
                    $prix = $prix + $produitCommandes->getPrix();
                }
                if($request->coupon){
                    $coupon =  Coupon::where('code', $request->coupon)->get();
                    if(!empty($coupon->all())){
                        $reduction = $coupon->all()[0]->remise;
                        $remise = $prix * intval($reduction) / 100;
                        $prix = $prix - $remise;
                    }
                }
            }
       Commande::where('id', $commande_id)->update([
           "prix" => $prix,
       ]);
       if($request->session()->get('panier')){
            $request->session()->put('panier',array());
        }
        $admins = User::where('admin',1)->get()->all();
        $message = "Vous avez une nouvelle commande n°" . $commande_id . ' de ' . Auth::user()->name;
        if(isset($request->note)){
            $message .= ' ' . $request->note;
        }
        foreach($admins as $admin){
            Notification::create([
                "message" => $message,
                "lu" => 0,
                'user_id' => $admin->id
            ]);
        }
        
       return redirect(route('home'));
   }
   public function utiliser(Request $request)
   {
    
        if(isset($request->code)){
            $coupon =  Coupon::where('code', $request->code)->get();
            if(!empty($coupon->all())){
                    $reduction = $coupon->all()[0]->remise;
                    $produits = [];
                    global $request;
                    if(!(Auth::user() && !empty($request->session()->get('panier')))){
                        if(!(Auth::user())){
                            return redirect(route('login'));
                        }
                        return redirect(route('panier'));
                    }
                        if($request->session()->get('panier')){
                            foreach($request->session()->get('panier') as $key=>$item){
                                $produits[$key] = array(
                                    'produit' => Produit::find($item['id_produit']),
                                    'quantite' => $item['quantite']
                                );
                            }
                        }
                return view('client.commande',compact('produits','coupon', 'reduction'));
            }
            else{
                return back()->with('coupon_not', "le coupon n'existe pas!!");
            }
        }
        else{
            return back()->with('coupon_verifier', "vérifier votre coupon");
        }
   }
}
