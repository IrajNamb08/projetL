<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ["categorie"];
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function getCategorie()
    {
        $categorie = Categorie::all();
        return $categorie;
    }
    
}
