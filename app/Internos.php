<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internos extends Model
{
    protected $fillable = [
    	'num_vaga', 'nome', 'data_entrada', 'data_saida', 'motivo_saida', 'procedencia',
    	'nascimento', 'naturalidade', 'rg', 'cpf', 'nome_pai', 'nome_mae', 'estado_civil',
    	'grau_instrucao', 'pendencia_judicial', 'motivo_acolhimento', 'tratamento_medico',
    	'profissao', 'internamento_anterior', 'documentos', 'docs_rg', 'docs_cpf', 'docs_titulo', 'docs_cnh',
    	'docs_ctps', 'docs_reservista', 'docs_c_nascimento', 'contato', 'beneficios', 'atendente'
    ];
}
