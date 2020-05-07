@extends('template.layout')

@section('content')
    <div class="content-form">
        <div class="header-form mt-5">
            <h2 class="card-title">Detalhes da Especialidade</h2>
                <div class="card-image">
                    <img src="{{ url('assets/img/specialty.svg') }}" alt="Especialidades">
                </div>
        </div>

        <form action="" class="col-lg-12">
            <div class="form-row col-lg-6">
                <div class="col-lg-12 mt-4">
                    <label>Nome da Especialidade</label>
                    <input 
                        id="nome_especialidade"
                        name="nome_especialidade"
                        type="text"
                        class="form-control"
                        placeholder="Digite o nome"
                        value="{{ $specialty->nome_especialidade }}"
                        disabled
                    />
                </div>
            </div>
        </form>
    </div>
@endsection