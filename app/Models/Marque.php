<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marque extends Model
{
    use HasFactory;
    protected $fillable = ["marque"];
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function getProduitInMarques($nbr = 2)
    {
        $produitM = [];
        $produitMarques = Produit::where('marques_id',$this->id)->take($nbr)->get();
        if(!empty($produitMarques->all())){
            foreach($produitMarques->all() as $produitMarque){
                $produitM[] = $produitMarque;
            }
        }else{
            return false;
        }
        return $produitM;
    }
}
