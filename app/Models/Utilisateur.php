<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_util',
        'adrs_util',
        'email_util',
        'num_util',
        'mdp_util',
    ];

    // Indiquer le nom de la colonne d'identification
    protected $primaryKey = 'id_util';
    protected $table = 'utilisateurs';
}
