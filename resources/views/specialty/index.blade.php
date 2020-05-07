@extends('template.layout')

@section('content')
   <div class="content-list mt-5">
      <div class="form-row">
         <div class="header-list col-lg-12">
            <div class="title">
               <h2>Especialidades</h2>
            </div>   
         
            <div class="button">
               <a href="{{ url('/specialty/create') }}" class="btn btn-create">
                  <i class="fa fa-plus pr-1"></i>
                  Especialidade
               </a>
               <a href="{{ route('pdfspecialty') }}" class="btn btn-create" target='_blank'>
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
                        <th>Nome Especialidade</th>
                        <th>Ações</th>
                     </tr>
                  </thead>
                  <tbody>

                     @foreach($specialty as $specialties)
                        <tr>
                           <td><img src="{{ url('assets/img/specialty.svg') }}" alt="especialidade"></td>
                           <td>{{ $specialties->id }}</td>
                           <td>{{ $specialties->nome_especialidade }}</td>
                           <td>
                              <div class="action">
                                 <form method="GET" action="{{ url("/specialty/edit/$specialties->id") }}">
                                    @csrf
                                       <button class="btn btn-circle">
                                          <i class="fa fa-pencil"></i>
                                       </button>
                                 </form>

                                 <form method="GET" action="{{ url("/specialty/show/$specialties->id") }}">
                                    @csrf
                                       <button class="btn btn-circle">
                                          <i class="fa fa-eye"></i>
                                       </button>
                                 </form>
         
                                 <form method="POST" action="{{ url("/specialty/remove/$specialties->id") }}">
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
         {{ $specialty->links() }}
      </div>
   </div>
@endsection