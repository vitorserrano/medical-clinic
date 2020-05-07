@extends('template.layout')

@section('content')
<div class="content-list mt-5">
   <div class="form-row">
      <div class="header-list col-lg-12">
         <div class="title">
            <h2>Pacientes</h2>
         </div>   
      
         <div class="button">
            <a href="{{ url('/patient/create') }}" class="btn btn-create">
               <i class="fa fa-plus pr-1"></i>
               Paciente
            </a>
            <a href="{{ route('pdfpatient') }}" class="btn btn-create" target='_blank'>
               <i class="fa fa-file pr-1"></i>
               Relatório
            </a>
         </div>

      </div>
      <div class="card-list col-lg-12 mt-3">
         @csrf
            <table class="table table-responsive-md table-hover">
               <thead>
                  <tr>
                     <th></th>
                     <th>#</th>
                     <th>Nome Paciente</th>
                     <th>Nascimento</th>
                     <th>CPF</th>
                     <th>RG</th>
                     <th>Celular</th>
                     <th>E-mail</th>
                     <th>Ações</th>
                  </tr>
               </thead>
               <tbody>

                  @foreach($patient as $patients)
                     <tr>
                        <td><img src="{{ url('assets/img/patient.svg') }}" alt="Paciente"></td>
                        <td>{{ $patients->id }}</td>
                        <td>{{ $patients->nome_paciente }}</td>
                        <td>{{ $patients->data_nascimento }}</td>
                        <td>{{ $patients->cpf }}</td>
                        <td>{{ $patients->rg }}</td>
                        <td>{{ $patients->fone_celular }}</td>
                        <td>{{ $patients->email }}</td>
                        <td>
                           <div class="action">
                              <form method="GET" action="{{ url("/patient/edit/$patients->id") }}">
                                 @csrf
                                    <button class="btn btn-circle">
                                       <i class="fa fa-pencil"></i>
                                    </button>
                              </form>

                              <form method="GET" action="{{ url("/patient/show/$patients->id") }}">
                                 @csrf
                                    <button class="btn btn-circle">
                                       <i class="fa fa-eye"></i>
                                    </button>
                              </form>
      
                              <form method="POST" action="{{ url("/patient/remove/$patients->id") }}">
                                 @csrf
                                    <button class="btn btn-remove-circle">
                                       <i class="fa fa-trash"></i>
                                    </button>
                              </form>
                           </div>
                        </td>
                     </tr>
                  @endforeach

               </tbody>
            </table>
      </div>
   </div>
   <div class="mt-2 float-right">
      {{ $patient->links() }}
   </div>
</div>
@endsection