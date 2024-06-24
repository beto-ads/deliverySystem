<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregador extends Model
{
    use HasFactory;

    protected $table = 'entregador';

    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'dataNascimento',
        'sexo',
        'estadoCivil',
        'email',
        'telefoneCelular',
        'estado',
        'cidade',
        'endereco',
        'numero',
        'bairro',
        'infoVeiculo',
    ];
}
