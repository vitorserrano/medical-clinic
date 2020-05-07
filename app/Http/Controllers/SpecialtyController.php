<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelSpecialty;

use PDF;

class SpecialtyController extends Controller
{

    private $objSpecialty;

    public function __construct()
    {
        $this->objSpecialty = new ModelSpecialty();
    }

    public function index()
    {
        $specialty = $this->objSpecialty->paginate(5);
        return view('specialty.index', compact('specialty'));
    }

    public function create()
    {
        return view('specialty.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'nome_especialidade' => 'required',
        ));

        $specialty = $this->objSpecialty->create([
            'nome_especialidade' => $request->nome_especialidade,
        ]);

        if ($specialty) {
            return redirect('/specialty');
        }
    }

    public function show($id)
    {
        $specialty = $this->objSpecialty->find($id);
        return view('specialty.show', compact('specialty'));
    }

    public function edit($id)
    {
        $specialty = $this->objSpecialty->find($id);
        return view('specialty.create', compact('specialty'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'nome_especialidade' => 'required',
        ));

        $this->objSpecialty
            ->where(['id' => $id])
            ->update([
                'nome_especialidade' => $request->nome_especialidade,
            ]);

        return redirect('/specialty');
    }

    public function destroy($id)
    {
        $this->objSpecialty->destroy($id);
        return redirect('/specialty');
    }

    public function print()
    {       
        $specialties = $this->objSpecialty->all();        
        $nomearquivo = "especialidade_" . date('YmdHis') . ".pdf";
        $pdf = PDF::loadview('specialty.print', compact('specialties'));
        return $pdf->setPaper('a4', 'landscape')->stream($nomearquivo);
    }
}
