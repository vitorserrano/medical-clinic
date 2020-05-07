@extends('template.layout')

@section('content')
    <div class="content-form">
        <div class="header-form mt-5">
            <h2 class="card-title">
                @if(isset($patient))
                    Edição do Paciente
                @else 
                    Cadastro do Paciente
                @endif
            </h2>
                <div class="card-image">
                    <img src="{{ url('assets/img/patient.svg') }}" alt="Pacientes">
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

        @if(isset($patient))
            <form name="formPatientEdit" method="POST" action="{{ url("/patient/update/$patient->id") }}" class="col-lg-12">
        @else 
            <form name="formPatientCreate" method="POST" action="{{ url("/patient/create") }}" class="col-lg-12">
        @endif
            @csrf
                <div class="form-row col-lg-6">
                    <div class="col-lg-8 mt-4">
                        <label>Nome do Paciente</label>
                        <input 
                            id="nome_paciente"
                            name="nome_paciente"
                            type="text"
                            class="form-control"
                            placeholder="Digite o nome"
                            value="{{ $patient->nome_paciente ?? '' }}"
                        />
                    </div>    

                    <div class="col-lg-4 mt-4">
                        <label>Celular</label>
                        <input 
                            id="fone_celular"
                            name="fone_celular"
                            type="text"
                            class="form-control"
                            placeholder="9 9999-9999"
                            value="{{ $patient->fone_celular ?? '' }}"
                        />
                    </div>    

                    <div class="col-lg-6 mt-4">
                        <label>CPF</label>
                        <input 
                            id="cpf"
                            name="cpf"
                            type="text"
                            class="form-control"
                            placeholder="999.999.999/99"
                            value="{{ $patient->cpf ?? '' }}"
                        />
                    </div>    

                    <div class="col-lg-6 mt-4">
                        <label>RG</label>
                        <input 
                            id="rg"
                            name="rg"
                            type="text"
                            class="form-control"
                            placeholder="Digite o RG"
                            value="{{ $patient->rg ?? '' }}"
                        />
                    </div>       

                    <div class="col-lg-8 mt-4">
                        <label>E-mail</label>
                        <input 
                            id="email"
                            name="email"
                            type="email"
                            class="form-control"
                            placeholder="Digite o e-mail"
                            value="{{ $patient->email ?? '' }}"
                        />
                    </div>    

                    <div class="col-lg-4 mt-4">
                        <label>Data de Nascimento</label>
                        <input 
                            id="data_nascimento"
                            name="data_nascimento"
                            type="date"
                            class="form-control"
                            value="{{ $patient->data_nascimento ?? '' }}"
                        />
                    </div> 
                </div>

                <button 
                    type="submit" 
                    class="btn btn-default mt-5"
                >
                    @if(isset($patient))
                        Editar
                    @else 
                        Cadastrar
                    @endif
                </button>
        </form>
    </div>
@endsection