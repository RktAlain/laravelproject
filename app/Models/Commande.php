<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cmd',
        'id_cli',
        'code_cmd',
        'nom_cli',
        'desg',
        'qte',
        'prix',
        'date',
    ];
    protected $primaryKey = 'id_cmd';
}
