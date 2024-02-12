<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivos extends Model
{
    use HasFactory;
    //Nome da tabela
    protected $table = 'arquivos';

    //Colunas para cadastro
    protected $fillable = ['id', 'nome', 'local', 'cliente_id'];
}
