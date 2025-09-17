<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    //
    protected $fillable = ['firstname','lastname','sexe','email','password','is_email_verified'];

     public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class,'role_utilisateurs','utilisateur_id','role_id');
    }
}
