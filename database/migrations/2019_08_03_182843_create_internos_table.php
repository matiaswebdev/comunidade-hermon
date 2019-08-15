<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('num_vaga')->unique();
            $table->string('nome');
            $table->text('foto_url')->nullable();
            $table->date('data_entrada')->nullable()->default(NULL);
            $table->date('data_saida')->nullable()->default(NULL);
            $table->text('motivo_saida')->nullable();
            $table->enum('procedencia', ['fas','creas','social','familia']);
            $table->date('nascimento')->nullable()->default(NULL);
            $table->string('naturalidade')->nullable();
            $table->string('rg')->nullable();
            $table->string('cpf')->nullable();
            $table->string('nome_pai')->nullable();
            $table->string('nome_mae')->nullable();
            $table->enum('estado_civil', ['casado', 'solteiro', 'divorciado', 'outros'])->nullable();
            $table->enum('grau_instrucao', ['basico', 'fundamental', 'medio', 'superior'])->nullable();
            $table->string('pendencia_judicial')->nullable();
            $table->text('motivo_acolhimento')->nullable();
            $table->text('tratamento_medico')->nullable();
            $table->string('profissao')->nullable();
            $table->string('internamento_anterior')->nullable();
            $table->text('documentos')->nullable();
            $table->string('contato')->nullable();
            $table->enum('beneficios', ['bf', 'aux_doenca', 'aposentadoria', 'outros'])->nullable();
            $table->integer('atendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internos');
    }
}
