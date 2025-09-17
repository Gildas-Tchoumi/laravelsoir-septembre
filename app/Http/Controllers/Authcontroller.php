<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    //validation de compte par d'email 

    public function verifyAccount($id) {

        $utilisateur = Utilisateur::find($id);

        if (!$utilisateur) {
            return redirect()->route('login')->with('error', 'Utilisateur non trouvé.');
        }

        if(!is_null($utilisateur)) {
            if($utilisateur->is_email_verified == 0) {

                $utilisateur->is_email_verified = 1;
                $utilisateur->save();
                return redirect()->route('login')->with('success', 'Votre compte a été vérifié avec succès. Vous pouvez maintenant vous connecter.');
            } else {
                return redirect()->route('login')->with('info', 'Votre compte est déjà vérifié. Veuillez vous connecter.');
            }
        }
    }

    //fonction de login

    public function login(Request $request) {
        // dd($request->all());

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dd(Auth::guard('utilisateurs')->attempt($credentials));

        if(Auth::guard('utilisateurs')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('welcome')->with('success', 'Connexion réussie.');
        }
    }
}
