<?php

namespace App\Models;

use App\Models\Couleur;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produitCouleur extends Model
{
    use HasFactory;
    protected $fillable = ["produit_id", "couleur_id"];
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    public function couleur()
    {
        return $this->belongsTo(Couleur::class);
    }
}
