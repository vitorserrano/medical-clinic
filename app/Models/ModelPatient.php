<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelPatient extends Model
{
    protected $table = 'patients';
    protected $fillable = [
        'nome_paciente',
        'cpf',
        'rg',
        'fone_celular',
        'email',
        'data_nascimento'
    ];

    public function relRegistrations() 
    {
        return $this->hasMany('App\Models\ModelRegistration', 'id_paciente');
    }
}
