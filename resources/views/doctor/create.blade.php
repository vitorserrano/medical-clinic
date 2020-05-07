@extends('template.layout')

@section('content')
    <div class="content-form">
        <div class="header-form mt-5">
            <h2 class="card-title">
                @if(isset($doctor))
                    Edição do Médico
                @else 
                    Cadastro do médico
                @endif
            </h2>
                <div class="card-image">
                    <img src="{{ url('assets/img/doctor.svg') }}" alt="Médico">
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

        @if(isset($doctor))
            <form name="formDoctorEdit" method="POST" action="{{ url("/doctor/update/$doctor->id") }}" class="col-lg-12">
        @else 
            <form name="formDoctorCreate" method="POST" action="{{ url("/doctor/create") }}" class="col-lg-12">
        @endif
            @csrf
                <div class="form-row col-lg-6">
                    <div class="col-lg-8 mt-4">
                        <label>Nome do Médico</label>
                        <input 
                            id="nome_medico"
                            name="nome_medico"
                            type="text"
                            class="form-control"
                            placeholder="Digito o nome"
                            value="{{ $doctor->nome_medico ?? '' }}"
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
                            value="{{ $doctor->fone_celular ?? '' }}"
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
                            value="{{ $doctor->cpf ?? '' }}"
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
                            value="{{ $doctor->rg ?? '' }}"
                        />
                    </div>      
                    
                    <div class="col-lg-6 mt-4">
                        <label>CRM</label>
                        <input 
                            id="crm"
                            name="crm"
                            type="text"
                            class="form-control"
                            placeholder="Digite o CRM"
                            value="{{ $doctor->crm ?? '' }}"
                        />
                    </div>  
                    
                    <div class="col-lg-6 mt-4">
                        <label>Especialidade</label>
                        <select class="form-control" name="id_especialidade" id="id_especialidade">
                            <option 
                                value="{{$doctor->relSpecialties->id ?? ''}}"
                            >{{ $doctor->relSpecialties->nome_especialidade ?? 'Selecione...' }}</option>
                                @foreach($specialty as $specialties)
                                    <option value="{{ $specialties->id }}">{{ $specialties->nome_especialidade }}</option>
                                @endforeach
                        </select>
                    </div> 

                    <div class="col-lg-6 mt-4">
                        <label>E-mail</label>
                        <input 
                            id="email"
                            name="email"
                            type="email"
                            class="form-control"
                            placeholder="Digite o e-mail"
                            value="{{ $doctor->email ?? '' }}"
                        />
                    </div>  
                    
                    <div class="col-lg-6 mt-4">
                        <label>Data de Nascimento</label>
                        <input 
                            id="data_nascimento"
                            name="data_nascimento"
                            type="date"
                            class="form-control"
                            value="{{ $doctor->data_nascimento ?? '' }}"
                        />
                    </div> 
                </div>

                <button 
                    type="submit" 
                    class="btn btn-default mt-5"
                >
                    @if(isset($doctor))
                        Editar
                    @else 
                        Cadastrar
                    @endif
                </button>
        </form>
    </div>
@endsection