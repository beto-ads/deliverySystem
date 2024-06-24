<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'dataNascimento',
        'sexo',
        'estado',
        'cidade',
        'endereco',
        'numero',
        'bairro',
        'email',
        'telefoneCelular',
        'estadoCivil',
    ];
}
