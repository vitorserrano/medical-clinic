<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h3>Relatório de Especialidades - Data: {{date('d/m/Y')}} </h3>
    <table>             
        <tr> 
            <td width="100px"> Especialidade </td> 

        </tr>
        @foreach ($specialties as $specialty)
            <tr>        
                <td> {{$specialty->nome_especialidade}} </td>      
            </tr>
        @endforeach
</body>
</html>

