<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conference extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'titre',
        'annee',
        'date',
        'file',
        'auteur',
        'mail',
        'auteurex',
        'mailex',
        'confname',
        'class'
    ];
}
