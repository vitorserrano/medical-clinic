<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelSpecialty extends Model
{
    protected $table = 'specialties';
    protected $fillable = [
        'nome_especialidade',       
    ];

    public function relDoctors() 
    {
        return $this->hasMany('App\Models\ModelDoctor', 'id_especialidade');
    }
}
