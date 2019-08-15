<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Internamentos extends Model
{
	protected $dates = [
		'data_entrada', 'data_saida'
	];

    protected $fillable = [
    	'internos_id', 'data_entrada', 'data_saida', 'motivo_saida'
    ];

    /**
     * Get the internos's data_entrada name.
     * @param  string  $value
     * @return string
     */
    public function getDataEntradaAttribute($value){ return Carbon::parse($value)->format('d/m/Y');}

    /**
     * Set the internos's data_entrada.
     * @return string
     */
    public function setDataEntradaAttribute($value)
    {
        $this->attributes['data_entrada'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }

    /**
     * Get the internos's data_entrada name.
     * @param  string  $value
     * @return string
     */
    public function getDataSaidaAttribute($value){ return Carbon::parse($value)->format('d/m/Y');}

    /**
     * Set the internos's data_entrada.
     * @return string
     */
    public function setDataSaidaAttribute($value)
    {
        $this->attributes['data_saida'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
    }
}
