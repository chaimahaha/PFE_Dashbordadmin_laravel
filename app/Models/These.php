<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class These extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
            'titre',
            'annee',
            'file',
            'sujet',
            'anneeinscrip',
            'encadrant',
            'mail_encadrant',
            'encadrant_2',
            'mail_encadrant_2',
            'cotutelle',
    ];
}
