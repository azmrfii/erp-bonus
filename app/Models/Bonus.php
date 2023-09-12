<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'totalBonus',
        'percentage1',
        'percentage2',
        'percentage3',
        'bonus1',
        'bonus2',
        'bonus3',
    ];
}
