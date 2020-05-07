<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h3>Relatório de Consultas - Data: {{date('d/m/Y')}} </h3>
    <table>             
        <tr> 
            <td width="100px"> Paciente </td>   
            <td width="100px"> Médico </td> 
            <td width="100px"> Data </td> 
            <td width="100px"> Hora </td> 
            <td width="100px"> Status </td> 
            <td width="100px"> Descrição </td>

        </tr>
        @foreach ($schedules as $schedule)
          @php
            $patient = $schedule->find($schedule->id)->relPatients;
            $doctor = $schedule->find($schedule->id)->relDoctors;
          @endphp
            <tr> 
                <td> {{$patient->nome_paciente}} </td>          
                <td> {{$doctor->nome_medico}} </td>          
                <td> {{$schedule->data_consulta}} </td>          
                <td> {{$schedule->hora_consulta}} </td>          
                <td> {{$schedule->consulta_realizada}} </td>          
                <td> {{$schedule->descricaoconsulta}} </td>          
            </tr>
        @endforeach
</body>
</html>

