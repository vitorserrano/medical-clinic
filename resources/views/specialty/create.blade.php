@extends('template.layout')

@section('content')
    <div class="content-form">
        <div class="header-form mt-5">
            <h2 class="card-title">
                @if(isset($specialty))
                    Edição da Especialidade
                @else 
                    Cadastro da Especialidade
                @endif
            </h2>
                <div class="card-image">
                    <img src="{{ url('assets/img/specialty.svg') }}" alt="Especilaidades">
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

        @if(isset($specialty))
            <form name="formSpecialtyEdit" method="POST" action="{{ url("/specialty/update/$specialty->id") }}" class="col-lg-12">
        @else 
            <form name="formSpecialtyCreate" method="POST" action="{{ url("/specialty/create") }}" class="col-lg-12">
        @endif
            @csrf
                <div class="form-row col-lg-6">
                    <div class="col-lg-12 mt-4">
                        <label>Nome da Especialidade</label>
                        <input 
                            id="nome_especialidade"
                            name="nome_especialidade"
                            type="text"
                            class="form-control"
                            placeholder="Digite o nome"
                            value="{{ $specialty->nome_especialidade ?? '' }}"
                        />
                    </div>                     
                </div>

                <button 
                    type="submit" 
                    class="btn btn-default mt-5"
                >
                    @if(isset($specialty))
                        Editar
                    @else 
                        Cadastrar
                    @endif
                </button>
        </form>
    </div>
@endsection