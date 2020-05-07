@extends('template.layout')

@section('content')
    <div class="content-form">
        <div class="header-form mt-5">
            <h2 class="card-title">Detalhes do Paciente</h2>
                <div class="card-image">
                    <img src="{{ url('assets/img/patient.svg') }}" alt="Pacientes">
                </div>
        </div>

        <form action="" class="col-lg-12">
            <div class="form-row col-lg-6">
                <div class="col-lg-8 mt-4">
                    <label>Nome do Paciente</label>
                    <input 
                        id="nome_paciente"
                        name="nome_paciente"
                        type="text"
                        class="form-control"
                        placeholder="Digite o nome"
                        value="{{ $patient->nome_paciente }}"
                        disabled
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
                        value="{{ $patient->fone_celular }}"
                        disabled
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
                        value="{{ $patient->cpf }}"
                        disabled
                    />
                </div>    

                <div class="col-lg-6 mt-4">
                    <label>RG</label>
                    <input 
                        id="rg"
                        name="rg"
                        type="text"
                        class="form-control"
                        placeholder="Digiter o RG"
                        value="{{ $patient->rg }}"
                        disabled
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
                        value="{{ $patient->email }}"
                        disabled
                    />
                </div>    

                <div class="col-lg-4 mt-4">
                    <label>Data de Nascimento</label>
                    <input 
                        id="data_nascimento"
                        name="data_nascimento"
                        type="date"
                        class="form-control"
                        value="{{ $patient->data_nascimento }}"
                        disabled
                    />
                </div> 
            </div>
        </form>
    </div>
@endsection