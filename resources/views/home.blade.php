@extends('template.layout')

@section('content')
    <div class="content">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-5 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Consultas</h2>
                        <div class="card-image">
                            <img src="{{ url('assets/img/schedule.svg') }}" alt="Consultas">
                        </div>
                        <p class="card-text">Cadastre, edite e veja detalhes das <strong>consultas</strong> da clínica.</p>
                        <a href="/schedule" class="btn btn-default">Listagem</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-5 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Pacientes</h2>
                        <div class="card-image">
                            <img src="{{ url('assets/img/patient.svg') }}" alt="Pacientes">
                        </div>
                        <p class="card-text">Cadastre, edite e veja detalhes dos <strong>pacientes</strong> da clínica.</p>
                        <a href="/patient" class="btn btn-default">Listagem</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-5 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Médicos</h2>
                        <div class="card-image">
                            <img src="{{ url('assets/img/doctor.svg') }}" alt="Médicos">
                        </div>
                        <p class="card-text">Cadastre, edite e veja detalhes dos <strong>médicos</strong> da clínica.</p>
                        <a href="/doctor" class="btn btn-default">Listagem</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-5 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Especialidades</h2>
                        <div class="card-image">
                            <img src="{{ url('assets/img/specialty.svg') }}" alt="Especialidades">
                        </div>
                        <p class="card-text">Cadastre, edite e veja detalhes das <strong>especialidades</strong> da clínica.</p>
                        <a href="/specialty" class="btn btn-default">Listagem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection