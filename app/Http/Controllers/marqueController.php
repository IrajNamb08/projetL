<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class marqueController extends Controller
{
    public function ajout()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        return view('marques.ajout');
    }
    public function enregistrer(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $validated = $request->validate([
            "marque" => 'required | unique:marques'
        ]);
        Marque::create([
            "marque" => $request->marque
        ]);
        return back()->with('marque_creer', 'marque ajouté!!');
    }
    public function listes()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $marques = Marque::all();

        return view('marques.liste',[
            'marques'=> $marques
        ]);
    }
    public function modifier($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        //$categories = DB::table('categories')->where('id', $id)->first();
        $marques= Marque::find($id);
        return view('marques.modifier', compact('marques'));
    }
    public function update(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Marque::where('id', $request->id)->update([
            "marque" => $request->marque
        ]);
        return back()->with('marque_update', 'marque modifier!!');
    }
    public function supprimer($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Marque::where('id', $id)->delete();
        return back()->with('marque_delete', 'marque supprimer!!');
    }
}
