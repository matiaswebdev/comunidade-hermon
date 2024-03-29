<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Internos extends Model
{
	use SoftDeletes;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'documentos' => 'array',
    ];

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
       'data_saida', 'data_entrada', 'nascimento'
    ];
	
    protected $fillable = [
    	'num_vaga', 'nome', 'data_entrada', 'data_saida', 'motivo_saida', 'procedencia',
    	'nascimento', 'naturalidade', 'rg', 'cpf', 'nome_pai', 'nome_mae', 'estado_civil',
    	'grau_instrucao', 'pendencia_judicial', 'motivo_acolhimento', 'tratamento_medico',
    	'profissao', 'internamento_anterior', 'documentos', 'contato', 'beneficios', 'atendente'
    ];


    /**
     * Get the interno's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNomeAttribute($value)
    {
        return ucfirst($value);
    }

     /**
     * Get the internos's data_entrada name.
     *
     * @param  string  $value
     * @return string
     */
    public function getDataEntradaAttribute($value)
    { 
        if(is_null($value)){
            return null;
        }else{
            return Carbon::parse($value)->format('d/m/Y'); 
        }
    }

    /**
     * Set the internos's data_entrada.
     * @return string
     */
    public function setDataEntradaAttribute($value)
    {   
    
        if(is_null($value)){
            $this->attributes['data_entrada'] = null;
        } else {
            $this->attributes['data_entrada'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
        }
    }

     /**
     * Get the internos's data_entrada name.
     *
     * @param  string  $value
     * @return string
     */
    public function getDataSaidaAttribute($value){
        if(is_null($value)){
            return null;
        }else{
            return Carbon::parse($value)->format('d/m/Y'); 
        }
    }

    /**
     * Set the internos's data_entrada.
     * @return string
     */
    public function setDataSaidaAttribute($value)
    {   
        
        if(is_null($value)){
            $this->attributes['data_saida'] = null;
        } else {
            $this->attributes['data_saida'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
        }
    }

     /**
     * Get the internos's data_entrada name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNascimentoAttribute($value)
    {
        if(is_null($value)){
            return null;
        }else{
            return Carbon::parse($value)->format('d/m/Y'); 
        }
    }

    /**
     * Set the internos's data_entrada.
     * @return string
     */
    public function setNascimentoAttribute($value)
    {
        if(is_null($value)){
            $this->attributes['nascimento'] = null;
        } else {
            $this->attributes['nascimento'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
        }
    }


    /**
     * Set the internos's data_entrada.
     * @return string
     */
    public function setNumVagaAttribute($value)
    {   
        $value = $this->max('num_vaga') + 1;
        $this->attributes['num_vaga'] = $value;
    }


}
