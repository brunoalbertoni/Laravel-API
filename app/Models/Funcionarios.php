<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    protected $table = 'funcionarios';
    protected $fillable=['nome','email','numero','departamentos_id'];
}



