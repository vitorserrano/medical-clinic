@extends('template.layout')

@section('content')
   <div class="content-list mt-5">
      <div class="form-row">
         <div class="header-list col-lg-12">
            <div class="title">
               <h2>Médicos</h2>
            </div>   
         
            <div class="button">
               <a href="{{ url('/doctor/create') }}" class="btn btn-create">
                  <i class="fa fa-plus pr-1"></i>
                  Médico
               </a>
               <a href="{{ route('pdfdoctor') }}" class="btn btn-create" target='_blank'>
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
                        <th>Médico</th>
                        <th>Celular</th>
                        <th>CPF</th>
                        <th>RG</th>
                        <th>CRM</th>
                        <th>E-mail</th>
                        <th>Data Nascimento</th>
                        <th>Especialidade</th>
                        <th>Ações</th>
                     </tr>
                  </thead>
                  <tbody>

                     @foreach($doctor as $doctors)                     
                        @php
                           $specialty = $doctors->find($doctors->id)->relSpecialties;                           
                        @endphp
                        <tr>
                           <td><img src="{{ url('assets/img/doctor.svg') }}" alt="Doctors"></td>
                           <td>{{ $doctors->id }}</td>
                           <td>{{ $doctors->nome_medico }}</td>                           
                           <td>{{ $doctors->fone_celular }}</td>
                           <td>{{ $doctors->cpf }}</td>
                           <td>{{ $doctors->rg }}</td>
                           <td>{{ $doctors->crm }}</td>
                           <td>{{ $doctors->email }}</td>
                           <td>{{ $doctors->data_nascimento }}</td>
                           <td>{{ $specialty->nome_especialidade }}</td>
                           <td>
                              <div class="action">
                                 <form method="GET" action="{{ url("/doctor/edit/$doctors->id") }}">
                                    @csrf
                                       <button class="btn btn-circle">
                                          <i class="fa fa-pencil"></i>
                                       </button>
                                 </form>

                                 <form method="GET" action="{{ url("/doctor/show/$doctors->id") }}">
                                    @csrf
                                       <button class="btn btn-circle">
                                          <i class="fa fa-eye"></i>
                                       </button>
                                 </form>
         
                                 <form method="POST" action="{{ url("/doctor/remove/$doctors->id") }}">
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
         {{ $doctor->links() }}
      </div>
   </div>
@endsection