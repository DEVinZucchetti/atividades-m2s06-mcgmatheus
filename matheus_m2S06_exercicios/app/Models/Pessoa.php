<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    //variavel para criar/atualzar campos via Eloquent
    protected $fillable = [
        'name',
        'cpf',
        'contact'
    ];
    // Variavel para ocultar campo do model nos retornos do front end
    protected $hidden = [
       // 'password' por exemplo
    ];


}
