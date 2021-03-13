<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato',function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->string('nome',100);
            $table->string('telefone',20);
            $table->string('email');
            $table->timestamps();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contato');
    }
}
