<?php

namespace App\Models;

use App\Models\Marque;
use App\Models\Categorie;
use App\Models\produitCouleur;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\UrlHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom",
        "description",
        "prix",
        "quantite",
        "reference",
        "produit_image",
        "marques_id",
        "categories_id"
    ];
    public function getMarque()
    {
        $marques= Marque::find($this->marques_id);
        return $marques->marque;
    }
    public function getCategorie()
    {
        $categories= Categorie::find($this->categories_id);
        return $categories->categorie;
    }
    public function getCouleurs()
    {
        $couleurs = [];
        $produitCouleurs = produitCouleur::where('produit_id', $this->id)->get();
        if(!empty($produitCouleurs->all())){
            foreach($produitCouleurs->all() as $produitCouleur){
                $couleur = Couleur::find($produitCouleur->couleur_id);
                $couleurs[] = $couleur;
            }
        }else{
            return false;
        }
        return $couleurs;
    }
    public function getImages()
    {
        $images = [];
        $produitImages = produitImage::where('produit_id', $this->id)->get();
        if(!empty($produitImages->all())){
            foreach($produitImages->all() as $produitImage){
                $image = Image::find($produitImage->image_id);
                $images[] = $image;
            }
        }else{
            return false;
        }
        return $images;
    }
   
}
