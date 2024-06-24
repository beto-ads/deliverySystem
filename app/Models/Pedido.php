<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedido';
    protected $guarded = [];

    protected $fillable = [
        'cliente_id',
        'usuario_id',
        'produto_id',
        'quantidade',
        'vUnitario',
        'vTotal',
    ];
}
