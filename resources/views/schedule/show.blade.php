@extends('template.layout')

@section('content')
    <div class="content-form">
        <div class="header-form mt-5">
            <h2 class="card-title">Detalhes da Consulta</h2>
                <div class="card-image">
                    <img src="{{ url('assets/img/schedule.svg') }}" alt="Consultas">
                </div>
        </div>

        <form class="col-lg-12">
            <div class="form-row col-lg-6">
                @php
                    $patient = $schedule->find($schedule->id)->relPatients;
                    $doctor = $schedule->find($schedule->id)->relDoctors;
                @endphp
                <div class="col-lg-6 mt-4">
                    <label>Paciente</label>
                    <input 
                        id="id_paciente"
                        name="id_paciente"
                        type="text"
                        class="form-control"
                        value="{{ $patient->nome_paciente }}"
                        disabled
                    />
                </div>    

                <div class="col-lg-6 mt-4">
                    <label>Médico</label>
                    <input 
                        id="id_medico"
                        name="id_medico"
                        type="text"
                        class="form-control"
                        value="{{ $doctor->nome_medico }}"
                        disabled
                    />
                </div>    

                <div class="col-lg-4 mt-4">
                    <label>Data</label>
                    <input 
                        id="data_consulta"
                        name="data_consulta"
                        type="text"
                        class="form-control"
                        value="{{ $schedule->data_consulta }}"
                        disabled
                    />
                </div>   

                <div class="col-lg-4 mt-4">
                    <label>Hora</label>
                    <input 
                        id="hora_consulta"
                        name="hora_consulta"
                        type="text"
                        class="form-control"
                        value="{{ $schedule->hora_consulta }}"
                        disabled
                    />
                </div> 
                
                <div class="col-lg-4 mt-4">
                    <label>Status</label>
                    <input 
                        id="consulta_realizada"
                        name="consulta_realizada"
                        type="text"
                        class="form-control"
                        value="{{ $schedule->consulta_realizada }}"
                        disabled
                    />
                </div>

                <div class="col-lg-12 mt-4">
                    <label>Descrição</label>
                    <input 
                        id="descricaoconsulta"
                        name="descricaoconsulta"
                        type="text"
                        class="form-control"
                        value="{{ $schedule->descricaoconsulta }}"
                        disabled
                    />
                </div>
            </div>
        </form>
    </div>
@endsection