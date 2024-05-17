<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_cli',
        'tel_cli',
        'adrs_cli',
        'email_cli',
    ];

    // Indiquer le nom de la colonne d'identification
    protected $primaryKey = 'id_cli';
}
