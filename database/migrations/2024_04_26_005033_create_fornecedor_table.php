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
        Schema::create('fornecedor', function (Blueprint $table) {
            $table->id();
            $table->string('nomeEmpresa', 150);
            $table->string('cnpj');
            $table->string('nomeContato', 150);
            $table->string('cargoContatoEmpresa', 150);
            $table->string('enderecoEmpresa', 150);
            $table->integer('telefoneFixo');
            $table->integer('telefoneCelular');
            $table->string('email', 150);
            $table->text('descricaoProduto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedor');
    }
};
