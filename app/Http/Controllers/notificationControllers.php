<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class notificationControllers extends Controller
{
    public function listes()
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        $notifications = Notification::all();
        return view('notification.liste',compact('notifications'));
        
    }
    public function voir($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Notification::where('id',$id)->update(['lu' => 1]);
        $notification = Notification::find($id);
        return view('notification.voir',compact('notification'));
    }
    public function supprimer($id)
    {
        if(!Gate::allows('access-admin')){
            return redirect(route('login'));
        }
        Notification::where('id', $id)->delete();
        return back()->with('notification_delete', 'notification supprimer!!');
    }
}
