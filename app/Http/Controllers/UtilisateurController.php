<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\VerifieEmail;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UtilisateurController extends Controller
{
    //
    public function liste() {
        $utilisateurs = Utilisateur::all();
        return view('Utilisateur.liste', compact('utilisateurs'));
    }
    public function create() {
        return view('Utilisateur.create');
    }

    // Enregistrer un nouvel utilisateur
    public function store(Request $request) {
        try {
            // dd($request->all());
            // Validation des champs
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'sexe' => 'required|in:masculin,feminin',
                'password' => 'required|string',
            ]);
            $messag = "Bonjour, merci pour votre inscription. Veuillez vérifier votre email.";
            // Enregistrement de l'utilisateur
            $utilisateur = new Utilisateur();
            $utilisateur->firstname = $request->firstname;
            $utilisateur->lastname = $request->lastname;
            $utilisateur->email = $request->email;
            $utilisateur->sexe = $request->sexe;
            $utilisateur->password = bcrypt($request->password); // Hash du mot de passe
            $utilisateur->save();
            // dd($utilisateur);

            Mail::to($utilisateur->email)->send(new VerifieEmail($utilisateur, $messag));

            return redirect()->route('messag')->with('success', 'Utilisateur enregistré avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement de l\'utilisateur. ' . $e->getMessage());
        }

    }
}
