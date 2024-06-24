<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedor';

    protected $fillable = [
        'id',
        'nomeEmpresa',
        'cnpj',
        'nomeContato',
        'cargoContato',
        'enderecoEmpresa',
        'telefoneFixo',
        'telefoneCelular',
        'email',
        'descricaoProduto',
    ];
}
