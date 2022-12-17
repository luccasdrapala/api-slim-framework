<?php

namespace App\Models;
use illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [ //preenchivel
        'titulo', 'descricao', 'preco', 'fabricante',
        'created_at', 'updated_at'
    ];
}

?>