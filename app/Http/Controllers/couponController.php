<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class couponController extends Controller
{
    public function ajout()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        return view('coupon.ajout');
    }
    public function enregistrer(Request $request)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Coupon::create([
            "remise" => $request->remise,
            "validite" => $request->validite,
            "code" => $request->code
        ]);
        return back()->with('coupon_creer', 'coupon ajouté!!');
    }
    public function listes()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $coupons = Coupon::all();

        return view('coupon.liste',[
            'coupons'=> $coupons,
        ]);
    }
    public function supprimer($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Coupon::where('id', $id)->delete();
        return back()->with('coupon_delete', 'coupon supprimer!!');
    }
    
}
