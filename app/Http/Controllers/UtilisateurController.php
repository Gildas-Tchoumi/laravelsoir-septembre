<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

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
            // Validation des champs
            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:utilisateurs,email',
                'sexe' => 'required|in:masculin,feminin',
                'password' => 'required|string',
            ]);

            // Enregistrement de l'utilisateur
            $utilisateur = new Utilisateur();
            $utilisateur->firstname = $request->firstname;
            $utilisateur->lastname = $request->lastname;
            $utilisateur->email = $request->email;
            $utilisateur->sexe = $request->sexe;
            $utilisateur->password = bcrypt($request->password); // Hash du mot de passe
            $utilisateur->save();

            return redirect()->route('utilisateurs.liste')->with('success', 'Utilisateur enregistré avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement de l\'utilisateur. ' . $e->getMessage());
        }

    }
}
