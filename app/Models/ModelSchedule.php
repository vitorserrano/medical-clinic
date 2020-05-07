<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSchedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = [
        'id_paciente',
        'id_medico',
        'data_consulta',
        'hora_consulta',
        'consulta_realizada',
        'descricaoconsulta'
    ];

    public function relDoctors() 
    {
        return $this->hasOne('App\Models\ModelDoctor', 'id', 'id_medico');
    }

    public function relPatients() 
    {
        return $this->hasOne('App\Models\ModelPatient', 'id', 'id_paciente');
    }
}
