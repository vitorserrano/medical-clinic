<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h3>Relatório de Médicos - Data: {{date('d/m/Y')}} </h3>
    <table>             
        <tr> 
            <td width="100px"> Médico </td>   
            <td width="100px"> Data Nascimento </td> 
            <td width="100px"> CPF </td> 
            <td width="100px"> RG </td> 
            <td width="100px"> CRM </td> 
            <td width="100px"> Celular </td> 
            <td width="100px"> E-mail </td>
            <td width="100px"> Especialidade </td>

        </tr>
        @foreach ($doctors as $doctor)
          @php
            $specialty = $doctor->find($doctor->id)->relSpecialties;
          @endphp
            <tr> 
                <td> {{$doctor->nome_medico}} </td>          
                <td> {{$doctor->data_nascimento}} </td>          
                <td> {{$doctor->cpf}} </td>          
                <td> {{$doctor->rg}} </td>          
                <td> {{$doctor->crm}} </td>          
                <td> {{$doctor->fone_celular}} </td>          
                <td> {{$doctor->email}} </td>          
                <td> {{$specialty->nome_especialidade}} </td>          
            </tr>
        @endforeach
</body>
</html>

