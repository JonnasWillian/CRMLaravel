<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    //Nome da tabela
    protected $table = 'cliente';

    //Colunas para cadastro
    protected $fillable = ['nome', 'email', 'telefone', 'descricao', 'user_id'];
}
