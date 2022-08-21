<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChapitreOuv extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'annee',
        'auteur',
        'mail',
        'auteurex',
        'mailex',
        'titre',
        'editeur',
        'lien',
        'edition',
        'isbn',
        'date'
    ];
}
