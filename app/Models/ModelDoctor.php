<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDoctor extends Model
{
    protected $table = 'doctors';
    protected $fillable = [
        'nome_medico',
        'data_nascimento',
        'cpf',
        'rg',
        'crm',
        'fone_celular',
        'email',
        'id_especialidade'
    ];

    public function relSpecialties() 
    {
        return $this->hasOne('App\Models\ModelSpecialty', 'id', 'id_especialidade');
    }

    public function relShedules() 
    {
        return $this->hasMany('App\Models\ModelSchedules', 'id_medico');
    }
}
