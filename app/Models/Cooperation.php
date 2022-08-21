<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cooperation extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'type',
        'intervenantnat',
        'intervenantin',
        'sujet',
        'institution',
        'file',
        'date_start',
        'date_end',
    ];
}
