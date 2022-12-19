<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleSc extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'annee',
        'titre',
        'lien',
        'file',
        'date',
        'auteur',
        'mail',
        'auteurex',
        'mailex',
        'titre_journal',
        'quartile',
        'volume',
        'impact',
        'indexation',
        'site_revue'

    ];
}
