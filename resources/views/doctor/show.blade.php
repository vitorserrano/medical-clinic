@extends('template.layout')

@section('content')
    <div class="content-form">
        <div class="header-form mt-5">
            <h2 class="card-title">Detalhes do Médico</h2>
                <div class="card-image">
                    <img src="{{ url('assets/img/doctor.svg') }}" alt="Médicos">
                </div>
        </div>

        <form class="col-lg-12">
            <div class="form-row col-lg-6">
                @php
                $specialty = $doctor->find($doctor->id)->relSpecialties;
                @endphp
                <div class="col-lg-8 mt-4">
                    <label>Nome do Médico</label>
                    <input 
                        id="nome_medico"
                        name="nome_medico"
                        type="text"
                        class="form-control"
                        placeholder="Digito o nome"
                        value="{{ $doctor->nome_medico }}"
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
                            value="{{ $doctor->fone_celular ?? '' }}"
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
                            value="{{ $doctor->cpf ?? '' }}"
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
                            placeholder="Digite o RG"
                            value="{{ $doctor->rg ?? '' }}"
                            disabled
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
                            disabled
                        />
                    </div>  
                                        
                    <div class="col-lg-6 mt-4">
                        <label>Especialidade</label>
                        <input 
                            id="id_especialidade"
                            name="id_especialidade"
                            type="text"
                            class="form-control"
                            value="{{ $specialty->nome_especialidade ?? '' }}"
                            disabled
                        />
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
                            disabled
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
                            disabled
                        />
                    </div> 
                </div>    
            </div>
        </form>
    </div>
@endsection