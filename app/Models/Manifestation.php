<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manifestation extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'titre',
        'lieu',
        'prix',
        'date_start',
        'date_end',
        'class',
        
    ];
}
