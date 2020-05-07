<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Relatório de Pacientes - Data: {{date('d/m/Y')}} </h3>
    <table>             
        <tr> 
            <td width="150px"> Paciente </td>   
            <td width="150px"> Data Nascimento </td> 
            <td width="150px"> CPF </td> 
            <td width="150px"> RG </td> 
            <td width="150px"> Celular </td> 
            <td width="150px"> E-mail </td>
        </tr>
        @foreach ($patients as $patient)
            <tr> 
                <td> {{$patient->nome_paciente}} </td>          
                <td> {{$patient->data_nascimento}} </td>          
                <td> {{$patient->cpf}} </td>          
                <td> {{$patient->rg}} </td>          
                <td> {{$patient->fone_celular}} </td>          
                <td> {{$patient->email}} </td>          
            </tr>
        @endforeach
</body>
</html>

