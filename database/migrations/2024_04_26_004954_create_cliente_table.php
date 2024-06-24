<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->date('dataNascimento');
            $table->string('sexo');
            $table->string('estado');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('email');
            $table->string('telefoneCelular');
            $table->string('estadoCivil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
