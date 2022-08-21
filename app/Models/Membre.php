<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membre extends Model
{
    use HasFactory,SoftDeletes;
    protected  $fillable= [
        'nom',
        'prenom',
        'cin',
        'numpassport',
        'cnrps',
        'gender',
        'grade',
        'mail',
        'mdp',
        'photo',
        'specialite',
        'diplome',
        'date',
        'fctadmin',
        'scopus',
        'orcid',
        'tel',
        'telfax',
        'datediplome'


    ];
}
