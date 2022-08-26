<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Master extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'titre',
        'file',
        'description',
        'encadrant',
        'mail_encadrant',
        'encadrant_2',
        'mail_encadrant_2',
        'institut',
        'etudiant',
        'date_start',
        'date_end'
];
}
