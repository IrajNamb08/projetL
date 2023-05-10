<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class categorieControllers extends Controller
{
    public function ajout()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        return view('categories.ajout');
    }
    public function enregistrer(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Categorie::create([
            "categorie" => $request->categorie
        ]);
        return back()->with('categorie_creer', 'catégorie ajouté!!');
    }
    public function listes()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $categories = Categorie::all();

        return view('categories.liste',[
            'categories'=> $categories
        ]);
    }
    public function modifier($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        //$categories = DB::table('categories')->where('id', $id)->first();
        $categories= Categorie::find($id);
        return view('categories.modifier', compact('categories'));
    }
    public function update(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Categorie::where('id', $request->id)->update([
            "categorie" => $request->categorie
        ]);
        return back()->with('categorie_update', 'catégorie modifier!!');
    }
    public function supprimer($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Categorie::where('id', $id)->delete();
        return back()->with('categorie_delete', 'catégorie supprimer!!');
    }
}
