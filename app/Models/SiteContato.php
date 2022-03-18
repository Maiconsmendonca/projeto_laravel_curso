<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{

   protected $fillable = ['name', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
}
