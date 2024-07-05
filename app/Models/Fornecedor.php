<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedor';

    public $primaryKey = 'fornecedor_id';

    protected $fillable = [
        'fornecedor_id',
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
