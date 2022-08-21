<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brevet extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'titre',
        'annee',
        'auteur',
        'mail',
        'auteurex',
        'mailex',
        'file',
        'sujet',
        'date'
    ];
}
