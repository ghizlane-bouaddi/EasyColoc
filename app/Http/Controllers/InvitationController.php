<?php

namespace App\Http\Controllers;


use App\Models\Colocation;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ColocationInvitation;
use App\Models\Invitation;

class InvitationController extends Controller
{


public function sendInvitation(Request $request, $colocationId)
{
    $request->validate(['email' => 'required|email']);

    $colocation = Colocation::findOrFail($colocationId);

    if(auth()->id() !== $colocation->owner_id){
        abort(403);
    }

    if(Invitation::where('colocation_id',$colocationId)
                 ->where('email',$request->email)
                 ->where('status','pending')
                 ->exists()){
        return back()->with('error','Invitation déjà envoyée');
    }

    $token = Str::random(40);

    $invitation = Invitation::create([
        'colocation_id' => $colocationId,
        'email' => $request->email,
        'token' => $token,
        'status' => 'pending',
    ]);

    Mail::to($request->email)->send(new ColocationInvitation($invitation));

    return back()->with('success','Invitation envoyée !');
}


public function acceptInvitation($token)
{
    $invitation = Invitation::where('token', $token)
                            ->where('status', 'pending')
                            ->firstOrFail();

    if(!auth()->check()){
        session(['invitation_token' => $token]);
        return redirect()->route('register');
    }

    $user = auth()->user();




if (strtolower(trim($user->email)) !== strtolower(trim($invitation->email))) {

    auth()->logout();

    session([
        'invitation_token' => $token,
        'invitation_email' => $invitation->email
    ]);

    return redirect()->route('register')
        ->with('error', 'Veuillez vous inscrire avec l’email invité : '.$invitation->email);
}

    if(!$invitation->colocation->members->contains($user->id)){
        $invitation->colocation->members()->attach($user->id, [
            'role' => 'member'
        ]);
    }

    $invitation->update([
        'status' => 'accepted'
    ]);

    session()->forget('invitation_token');

    return redirect()->route('colocations.show', $invitation->colocation_id)
                     ->with('success', 'Bienvenue dans la colocation !');
}
}
