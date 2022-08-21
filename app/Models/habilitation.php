<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class habilitation extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'titre',
        'nom',
        'annee',
        'file',
        'encadrant',
        'mail_encadrant',
        'date',
];
}
