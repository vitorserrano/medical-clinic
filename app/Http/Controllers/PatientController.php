<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPatient;

use PDF;

class PatientController extends Controller
{
    
    private $objPatient;

    public function __construct()
    {
        $this->objPatient = new ModelPatient();
    }

    public function index()
    {   
        $patient = $this->objPatient->paginate(5);
        return view('patient.index', compact('patient'));
    }

    public function create()
    {
        return view('patient.create');
    }

    public function store(Request $request)
    {   
        $this->validate($request, array(
            'nome_paciente' => 'required',
            'cpf' => 'required|size:11|unique:patients,cpf',
            'rg' => 'unique:patients,rg',
            'fone_celular' => 'required|size:11|unique:patients,fone_celular',
            'email' => 'required|unique:patients,email',
        ));

        $patient = $this->objPatient->create([
            'nome_paciente' => $request->nome_paciente,
            'fone_celular' => $request->fone_celular,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'email' => $request->email,
            'data_nascimento' => $request->data_nascimento,
        ]);

        if ($patient) { 
            return redirect('/patient');
        }
    }

    public function show($id)
    {   
        $patient = $this->objPatient->find($id);
        return view('patient.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = $this->objPatient->find($id);
        return view('patient.create', compact('patient'));
    }

    public function update(Request $request, $id)
    {   
        $this->validate($request, array(
            'nome_paciente' => 'required',
            'cpf' => "required|size:11|unique:patients,cpf,$id",
            'rg' => "unique:patients,rg,$id",
            'fone_celular' => "required|size:11|unique:patients,fone_celular,$id",
            'email' => "required|unique:patients,email,$id",
        ));

        $this->objPatient
            ->where(['id' => $id])
            ->update([
                'nome_paciente' => $request->nome_paciente,
                'fone_celular' => $request->fone_celular,
                'cpf' => $request->cpf,
                'rg' => $request->rg,
                'email' => $request->email,
                'data_nascimento' => $request->data_nascimento,
            ]);

            return redirect('/patient');
    }

    public function destroy($id)
    {
        $this->objPatient->destroy($id);
        return redirect('/patient');
    }

    public function print()
    {
        $patients = $this->objPatient->all();
        $nomearquivo = "pacientes_" . date('YmdHis') . ".pdf";
        $pdf = PDF::loadview('patient.print', compact('patients'));
        return $pdf->setPaper('a4', 'landscape')->stream($nomearquivo);
    }
}
