<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ModelPatient;
use App\Models\ModelDoctor;
use App\Models\ModelSchedule;

use PDF;

class scheduleController extends Controller
{
    
    private $objPatient;
    private $objDoctor;
    private $objSchedule;

    public function __construct()
    {   
        $this->objPatient = new ModelPatient();
        $this->objDoctor = new ModelDoctor();
        $this->objSchedule = new ModelSchedule();
    }

    public function index()
    {   
        $schedule = $this->objSchedule->paginate(5);
        return view('schedule.index', compact('schedule'));
    }

    public function create()
    {
        $patient = $this->objPatient->all();
        $doctor = $this->objDoctor->all();
        return view('schedule.create', compact('patient', 'doctor'));
    }

    public function store(Request $request)
    {   
        $this->validate($request, array(
            'id_paciente'=> 'required',
            'id_medico'=> 'required',
            'data_consulta'=> 'required',
            'hora_consulta'=> 'required',
            'consulta_realizada'=> 'required',
            'descricaoconsulta'=> 'required'
        ));

        $schedule = $this->objSchedule->create([
            'id_paciente' => $request->id_paciente,
            'id_medico' => $request->id_medico,
            'data_consulta' => $request->data_consulta,
            'hora_consulta' => $request->hora_consulta,
            'consulta_realizada' => $request->consulta_realizada,
            'descricaoconsulta' => $request->descricaoconsulta
        ]);

        if ($schedule) { 
            return redirect('/schedule');
        }
    }

    public function show($id)
    {   
        $schedule = $this->objSchedule->find($id);
        return view('schedule.show', compact('schedule'));
    }

    public function edit($id)
    {
        $schedule = $this->objSchedule->find($id);

        $patient = $this->objPatient->all();
        $doctor = $this->objDoctor->all();
        return view('schedule.create', compact('schedule', 'patient', 'doctor'));
    }

    public function update(Request $request, $id)
    {   
        $this->validate($request, array(
            'id_paciente'=> 'required',
            'id_medico'=> 'required',
            'data_consulta'=> 'required',
            'hora_consulta'=> 'required',
            'consulta_realizada'=> 'required',
            'descricaoconsulta'=> 'required'
        ));

        $this->objSchedule
            ->where(['id' => $id])
            ->update([
                'id_paciente' => $request->id_paciente,
                'id_medico' => $request->id_medico,
                'data_consulta' => $request->data_consulta,
                'hora_consulta' => $request->hora_consulta,
                'consulta_realizada' => $request->consulta_realizada,
                'descricaoconsulta' => $request->descricaoconsulta
            ]);

            return redirect('/schedule');
    }

    public function destroy($id)
    {
        $this->objSchedule->destroy($id);
        return redirect('/schedule');
    }

    public function print()
    {
        $doctors = $this->objDoctor->all();
        $patients = $this->objPatient->all();        
        $schedules = $this->objSchedule->all();        
        $nomearquivo = "consulta_" . date('YmdHis') . ".pdf";
        $pdf = PDF::loadview('schedule.print', compact('schedules', 'doctors', 'patients'));
        return $pdf->setPaper('a4', 'landscape')->stream($nomearquivo);
    }
}
