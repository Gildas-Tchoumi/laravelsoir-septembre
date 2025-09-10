<?php

namespace App\Models;

use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function utilisateurs(): BelongsToMany
    {
        return $this->belongsToMany(Utilisateur::class,'role_utilisateurs','role_id','utilisateur_id');
    }
}
