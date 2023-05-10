<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Marque;
use App\Models\Couleur;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Str;
use App\Models\produitImage;
use Illuminate\Http\Request;
use App\Models\produitCouleur;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class produitController extends Controller
{
    public function ajout()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $marques = Marque::all();
        $categories = Categorie::all();
        $couleurs = Couleur::all();
        
        return view('produits.ajout',
        compact('couleurs', 'marques', 'categories'));
    }
    public function enregistrer(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $images = [];
        $donnee = array(
            "nom" => $request->nom,
            "description"=>$request->description,
            "prix"=>$request->prix,
            "quantite"=>$request->quantite,
            "reference"=>$request->reference,
            "marques_id" =>$request->marques_id,
            "categories_id" =>$request->categories_id
        );
        
        if($request->hasFile("produit_image"))
            {
                $files = $request->file("produit_image");
                //dd($files);
                foreach ($files as $key=>$file){
                    $extension = $file->getClientOriginalExtension();
                    $filename = Str::slug($request->nom).$key.'.'.$extension;
                    $file->move('uploads/produits/', $filename);
                    $image = [
                        "nom"=>$filename,
                        "chemin" => public_path("/uploads/produits" . $filename),
                        "url"=> url('/uploads/produits/'. $filename)
                    ];
                    $id_image = Image::create($image)->id;
                    $images[] = $id_image;
                }
            }
        $produit_id = Produit::create($donnee)->id;
        foreach($images as $image){
            $produit_image = [
                "produit_id" => $produit_id,
                "image_id" => $image
            ];
            produitImage::create($produit_image);
        }
        if($request->produit_couleur){
            foreach($request->produit_couleur as $couleur){
                $produit_couleur = [
                    "produit_id"=>$produit_id,
                    "couleur_id"=>$couleur
                ];
                produitCouleur::create($produit_couleur);
            }
        }
        return back()->with('produit_creer', 'produit ajouté!!');
    }
    public function listes()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $produits = Produit::all();
        return view('produits.liste',[
            "produits" => $produits,
        ]);
    }
    public function modifier($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $marques = Marque::all();
        $categories = Categorie::all();
        $produits = Produit::find($id);
        $couleurs = Couleur::all();
        $allCouleurs = [];
        if($produits->getCouleurs() && !empty($produits->getCouleurs())):
            foreach($produits->getCouleurs() as $couleur){
                $allCouleurs[] = $couleur->id;
            }
        endif;
        $data = array(
            "produits" => $produits,
            'marques'=> $marques,
            'categories' => $categories,
            'couleurs'=>$couleurs,
            'allCouleurs'=>$allCouleurs
        );
        return view('produits.modifier', $data);
    }
    public function update(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $donnee = array(
            "nom" => $request->nom,
            "description"=>$request->description,
            "prix"=>$request->prix,
            "quantite"=>$request->quantite,
            "reference"=>$request->reference,
            "marques_id" =>$request->marques_id,
            "categories_id" =>$request->categories_id
        );
        if($request->hasFile("produit_image"))
            {
                $files = $request->file("produit_image");
                //dd($files);
                foreach ($files as $key=>$file){
                    $extension = $file->getClientOriginalExtension();
                    if (!empty(Image::orderBy('id', 'DESC')->first())) {
                        $last = Image::orderBy('id', 'DESC')->first()->id;
                    }
                    else{
                        $last = 0;
                    }
                    $lastId = intval($last) + 1;
                    $filename = Str::slug($request->nom).$key.$lastId.'.'.$extension;
                    $file->move('uploads/produits/', $filename);
                    $image = [
                        "nom"=>$filename,
                        "chemin" => public_path("uploads\produits\\" . $filename),
                        "url"=> url('/uploads/produits/'. $filename)
                    ];
                    $id_image = Image::create($image)->id;
                    $images[] = $id_image;
                }
            }
        $produit_id = Produit::where('id',intval($request->id))->update($donnee);
        if(!empty($images)){
            foreach($images as $image){
                $produit_image = [
                    "produit_id" => $request->id,
                    "image_id" => $image
                ];
                produitImage::create($produit_image);
            }
        }
        $produits = Produit::find($produit_id);
        if($request->produit_couleur){
            $allCouleurs = [];
            if($produits->getCouleurs() && !empty($produits->getCouleurs())):
                foreach($produits->getCouleurs() as $couleur){
                    $allCouleurs[] = $couleur->id;
                    if(!in_array($couleur->id,$request->produit_couleur)){
                        produitCouleur::where("produit_id", $produit_id)
                                        ->where("couleur_id",$couleur->id)
                                        ->delete();
                    }
                }
            endif;
            foreach($request->produit_couleur as $couleur){
                if(!in_array($couleur,$allCouleurs)){
                    $produit_couleur = [
                        "produit_id"=>$produit_id,
                        "couleur_id"=>$couleur
                    ];
                    produitCouleur::create($produit_couleur);
                }
            }
        }
        
        return back()->with('produit_update', 'produit modifié');
    }
    public function supprimer($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $produit = Produit::find($id);
        if($produit->getImages() && !empty($produit->getImages())){
                foreach($produit->getImages() as $image)
            {
                Image::where('id', $image->id)->delete();
            }
        }
        Produit::where('id',$id)->delete();
        return back()->with('produit_delete', 'produit supprimé');
    }
    public function suppreImage($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $imageName = Image::find($id)->chemin;
        // dd($imageName);
        unlink($imageName);
        // Storage::disk('public')->delete("uploads\produits\\" . $imageName);
        Image::where('id',$id)->delete();
        return back()->with('image_delete', 'Image supprimé');
    }
    
}
