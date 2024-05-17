<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cli',
    ];

    // Indiquer le nom de la colonne d'identification
    protected $primaryKey = 'id_fact';

}
