<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelDoctor;
use App\Models\ModelSpecialty;

use PDF;

class DoctorController extends Controller
{
    
    private $objDoctor;

    public function __construct()
    {
        $this->objDoctor = new ModelDoctor();
        $this->objSpecialty = new ModelSpecialty();
    }

    public function index()
    {   
        $doctor = $this->objDoctor->paginate(5);
        return view('doctor.index', compact('doctor'));
    }

    public function create()
    {
        $specialty = $this->objSpecialty->all();
        return view('doctor.create', compact('specialty'));
    }

    public function store(Request $request)
    {   
        $this->validate($request, array(
            'nome_medico' => 'required',
            'cpf' => 'required|size:11|unique:doctors,cpf',
            'rg' => 'unique:doctors,rg',
            'crm' => 'unique:doctors,crm',
            'fone_celular' => 'required|size:11|unique:doctors,fone_celular',
            'email' => 'required|unique:doctors,email',
            'id_especialidade' => 'required'
        ));

        $doctor = $this->objDoctor->create([
            'nome_medico' => $request->nome_medico,
            'fone_celular' => $request->fone_celular,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'crm' => $request->crm,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
            'id_especialidade' => $request->id_especialidade
        ]);

        if ($doctor) { 
            return redirect('/doctor');
        }
    }

    public function show($id)
    {   
        $doctor = $this->objDoctor->find($id);
        return view('doctor.show', compact('doctor'));
    }

    public function edit($id)
    {
        $specialty = $this->objSpecialty->all();        
        $doctor = $this->objDoctor->find($id);
        return view('doctor.create', compact('doctor', 'specialty'));
    }

    public function update(Request $request, $id)
    {   
        $this->validate($request, array(
            'nome_medico' => 'required',
            'cpf' => "required|size:11|unique:doctors,cpf,$id",            
            'rg' => "unique:doctors,rg,$id",
            'crm' => "unique:doctors,crm,$id",
            'fone_celular' => "required|size:11|unique:doctors,fone_celular,$id",
            'email' => "required|unique:doctors,email,$id",
            'id_especialidade' => 'required'
        ));

        $this->objDoctor
            ->where(['id' => $id])
            ->update([
                'nome_medico' => $request->nome_medico,
                'fone_celular' => $request->fone_celular,
                'cpf' => $request->cpf,
                'rg' => $request->rg,
                'crm' => $request->crm,
                'email' => $request->email,
                'data_nascimento' => $request->data_nascimento,
                'id_especialidade' => $request->id_especialidade
            ]);

            return redirect('/doctor');
    }

    public function destroy($id)
    {
        $this->objDoctor->destroy($id);
        return redirect('/doctor');
    }

    public function print()
    {
        $doctors = $this->objDoctor->all();
        $specialties = $this->objSpecialty->all();
        $nomearquivo = "medicos_" . date('YmdHis') . ".pdf";
        $pdf = PDF::loadview('doctor.print', compact('doctors', 'specialties'));
        return $pdf->setPaper('a4', 'landscape')->stream($nomearquivo);
    }
}
