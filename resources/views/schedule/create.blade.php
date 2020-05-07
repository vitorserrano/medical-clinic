@extends('template.layout')

@section('content')
    <div class="content-form">
        <div class="header-form mt-5">
            <h2 class="card-title">
                @if(isset($schedule))
                    Edição da Consulta
                @else 
                    Cadastro da Consulta
                @endif
            </h2>
                <div class="card-image">
                    <img src="{{ url('assets/img/schedule.svg') }}" alt="Consulta">
                </div>
        </div>

        @if(isset($errors) && count ($errors) > 0) 
            <div class="col-lg-12 d-flex justify-content-center align-items-center flex-column">
                @foreach($errors->all() as $error)
                    <div class="col-lg-4 alert alert-danger p-2 mt-1 mb-1">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif

        @if(isset($schedule))
            <form name="formScheduleEdit" method="POST" action="{{ url("/schedule/update/$schedule->id") }}" class="col-lg-12">
        @else 
            <form name="formScheduleCreate" method="POST" action="{{ url("/schedule/create") }}" class="col-lg-12">
        @endif
            @csrf
                <div class="form-row col-lg-6">
                    <div class="col-lg-6 mt-4">
                        <label>Paciente</label>
                        <select class="form-control" name="id_paciente" id="id_paciente">
                            <option 
                                value="{{$schedule->relPatients->id ?? ''}}"
                            >{{ $schedule->relPatients->nome_paciente ?? 'Selecione...' }}</option>
                                @foreach($patient as $patients)
                                    <option value="{{ $patients->id }}">{{ $patients->nome_paciente }}</option>
                                @endforeach
                        </select>
                    </div>    

                    <div class="col-lg-6 mt-4">
                        <label>Médico</label>
                        <select class="form-control" name="id_medico" id="id_medico">
                            <option 
                                value="{{ $schedule->relDoctors->id ?? '' }}"
                            >{{ $schedule->relDoctors->nome_medico ?? 'Selecione...' }}</option>
                                @foreach($doctor as $doctors)
                                    <option value="{{ $doctors->id }}">{{ $doctors->nome_medico }}</option>
                                @endforeach
                        </select>
                    </div>    
                    
                    <div class="col-lg-4 mt-4">
                        <label>Data Consulta</label>
                        <input 
                            id="data_consulta"
                            name="data_consulta"
                            type="date"
                            class="form-control"
                            value="{{ $schedule->data_consulta ?? '' }}"
                        />
                    </div> 

                    <div class="col-lg-4 mt-4">
                        <label>Hora Consulta</label>
                        <input 
                            id="hora_consulta"
                            name="hora_consulta"
                            type="hour"
                            class="form-control"
                            value="{{ $schedule->hora_consulta ?? '' }}"
                        />
                    </div> 

                    <div class="col-lg-4 mt-4">
                        <label>Status</label>
                        <select name="consulta_realizada" id="consulta_realizada" class="form-control">
                            <option value="{{ $schedule->consulta_realizada ?? 'NAO' }}">
                                {{$schedule->consulta_realizada ?? 'NÃO'}}
                            </option>                         
                            <option value="SIM">SIM</option>
                        </select>
                    </div>                                       

                    <div class="col-lg-12 mt-4">
                        <label>Descrição</label>
                        <input 
                            id="descricaoconsulta"
                            name="descricaoconsulta"
                            type="text"
                            class="form-control"
                            placeholder="Escreva uma descrição"
                            value="{{$schedule->descricaoconsulta ?? '' }}"
                        />                        
                    </div>      
                </div>

                <button 
                    type="submit" 
                    class="btn btn-default mt-5"
                >
                    @if(isset($schedule))
                        Editar
                    @else 
                        Cadastrar
                    @endif
                </button>
        </form>
    </div>
@endsection