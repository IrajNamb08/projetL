<?php

namespace App\Models;

use App\Models\Commande;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produitCommande extends Model
{
    use HasFactory;
    protected $fillable = ["produit_id", "commande_id",'quantite'];

    public function produit()
    {
        return $this->belongTo(Produit::class);
    }
    public function commande()
    {
        return $this->belongTo(Commande::class);
    }
    public function getPrix()
    {
        $produits = Produit::find($this->produit_id);
        
        return floatval($produits->prix)  * intval($this->quantite);
    }
}
