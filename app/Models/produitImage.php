<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produitImage extends Model
{
    use HasFactory;

    protected $fillable = ["produit_id", "image_id"];

    public function produit()
    {
        return $this->belongTo(Produit::class);
    }
    public function image()
    {
        return $this->belongTo(Image::class);
    }

}
