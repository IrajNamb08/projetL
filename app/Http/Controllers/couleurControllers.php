<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class couleurControllers extends Controller
{
    public function ajout()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        return view('couleurs.ajout');
    }
    public function enregistrer(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Couleur::create([
            "nom" => $request->nom,
            "code" => $request->code
        ]);
        return back()->with('couleur_creer', 'couleur ajouté!!');
    }
    public function listes()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $couleurs = Couleur::all();

        return view('couleurs.liste',[
            'couleurs'=> $couleurs,
        ]);
    }
    public function modifier($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        //$categories = DB::table('categories')->where('id', $id)->first();
        $couleurs= Couleur::find($id);
        return view('couleurs.modifier', compact('couleurs'));
    }
    public function update(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Couleur::where('id', $request->id)->update([
            "nom" => $request->nom,
            "code" => $request->code
        ]);
        return back()->with('couleur_update', 'couleur modifier!!');
    }
    public function supprimer($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Couleur::where('id', $id)->delete();
        return back()->with('couleur_delete', 'couleur supprimer!!');
    }
}
