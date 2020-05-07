@extends('template.layout')

@section('content')
   <div class="content-list mt-5">
      <div class="form-row">
         <div class="header-list col-lg-12">
            <div class="title">
               <h2>Consultas</h2>
            </div>   
         
            <div class="button">
               <a href="{{ url('/schedule/create') }}" class="btn btn-create">
                  <i class="fa fa-plus pr-1"></i>
                  Consulta
               </a>
               <a href="{{ route('pdfschedule') }}" class="btn btn-create" target='_blank'>
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
                        <th>Paciente</th>
                        <th>Médico</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Status</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                     </tr>
                  </thead>
                  <tbody>

                     @foreach($schedule as $schedules)
                        @php
                           $patient = $schedules->find($schedules->id)->relPatients;
                           $doctor = $schedules->find($schedules->id)->relDoctors;
                        @endphp
                           <tr>
                              <td><img src="{{ url('assets/img/schedule.svg') }}" alt="Instrutor"></td>
                              <td>{{ $schedules->id }}</td>
                              <td>{{ $patient->nome_paciente }}</td>
                              <td>{{ $doctor->nome_medico }}</td>                              
                              <td>{{ $schedules->data_consulta }}</td>
                              <td>{{ $schedules->hora_consulta }}</td>
                              <td>{{ $schedules->consulta_realizada }}</td>
                              <td>{{ $schedules->descricaoconsulta }}</td>
                              <td>
                                 <div class="action">
                                    <form method="GET" action="{{ url("/schedule/edit/$schedules->id") }}">
                                       @csrf
                                          <button class="btn btn-circle">
                                             <i class="fa fa-pencil"></i>
                                          </button>
                                    </form>

                                    <form method="GET" action="{{ url("/schedule/show/$schedules->id") }}">
                                       @csrf
                                          <button class="btn btn-circle">
                                             <i class="fa fa-eye"></i>
                                          </button>
                                    </form>
            
                                    <form method="POST" action="{{ url("/schedule/remove/$schedules->id") }}">
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
            {{ $schedule->links() }}
         </div>
   </div>
@endsection