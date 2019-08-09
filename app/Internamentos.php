<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internamentos extends Model
{
    protected $fillable = [
    	'users_id', 'data_entrada', 'data_saida'
    ];
}
