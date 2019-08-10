<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internamentos extends Model
{
    protected $fillable = [
    	'internos_id', 'data_entrada', 'data_saida'
    ];
}
