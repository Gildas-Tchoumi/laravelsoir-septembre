<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function liste() {
        $roles = Role::all();
        return view('Roles.liste', compact('roles'));
    }
    public function create() {
        return view('Roles.create');
    }

    // Enregistrer un nouvel utilisateur
    public function store(Request $request) {
        try {
            // Validation des champs
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            // Enregistrement de l'utilisateur
            $role = new Role();
            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();

            return redirect()->route('roles.liste')->with('success', 'role enregistré avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement du role. ' . $e->getMessage());
        }

    }

    //view to assign role to user
    public function assignRole($id) {

        $utilisateur = Utilisateur::find($id);

        if (!$utilisateur) {
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');
        }
        $roles = Role::all();
        return view('Roles.roleassign', compact('utilisateur', 'roles'));
    }

    //assign role to user
    public function storeAssignRole(Request $request, $id) {
        try {
            
            //validation
            $request->validate([
                'role_id' => 'required',
            ]); 
            $utilisateur = Utilisateur::find($id);
            // dd($utilisateur);
            if (!$utilisateur) {    
                return redirect()->back()->with('error', 'Utilisateur non trouvé.');
            }
            //assign role to user
            $utilisateur->roles()->attach($request->role_id);
            return redirect()->route('utilisateurs.liste')->with('success', 'Role assigné avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'assignation du role. ' . $e->getMessage());
        }


    }
}
