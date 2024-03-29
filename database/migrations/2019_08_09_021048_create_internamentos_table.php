<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('internos_id');
            $table->date('data_entrada');
            $table->date('data_saida');
            $table->text('motivo_saida');
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
        Schema::dropIfExists('internamentos');
    }
}
