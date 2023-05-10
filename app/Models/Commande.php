<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produit;
use App\Models\produitCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['statut','user_id','produit_id','prix','note'];
    public function getUsers()
    {
        $users = User::find($this->user_id);
        return $users->name;
    }
    public function getUserId()
    {
        
    }
    public function getDate()
    {
        $start = $this->created_at->format('d/m/Y');
        return $start;
    }
    public function getProduits()
    {
        $produits = [];
        $produitCommandes = produitCommande::where('commande_id', $this->id)->get();
        $i = 0;
        if(!empty($produitCommandes->all())){
            foreach($produitCommandes->all() as $produitCommande){
                $produit = Produit::find($produitCommande->produit_id);
                $produits[$i]['produit'] = $produit;
                $produits[$i]['quantite'] = $produitCommande->quantite;
                $i++;
            }
        }else{
            return false;
        }
        return $produits;
    }
}
