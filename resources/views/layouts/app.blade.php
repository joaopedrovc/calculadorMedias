<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Calculador de Média') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DatePicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        <style>
                #loader{
                    visibility:hidden;
                }
                #novaUCdiv{
                    visibility:hidden;
                }
                #tabela{
                    visibility:visible;
                }
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                }
                
                td, th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }
                
                tr:nth-child(even) {
                    background-color: #dddddd;
                }
                </style>
    </head>
    <body>
        <div id="app">
            <div class="container">
                @yield('content')
            </div>
        </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Date Picker -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
            function removeLine(id) {
                $('#row' + id).remove();
            }

            function checkIfExists(id) {
                if($("#" + name).length == 0) {
                    //it doesn't exist
                  }
            }

            function validateFormOnSubmit(theForm) {
                var nome = theForm.nome.value;
                var ects = theForm.ects.value;
                var id = theForm.id.value;
                if(nome == "") {
                    alert("Nome da UC não pode estar vazio\n");
                    return false;
                }
                if(ects < 1 || ects > 20) {
                    alert("Numero de ects errado\n");
                    return false;
                }
                if(id < 2000 || id > 2050) {
                    alert("ID tem de ser entre 2000 e 2050\n");
                    return false;
                }
                if($('#row' + id).length != 0) {
                    alert("ID já existe\n");
                    return false;
                  }

                $('#myTable tr:last').after('<tr id="row'+id+'"><td>'+ id +'</td><td>-----</td><td>'+ nome +'</td><td>'+ ects +' ECTS </td><td><input class="nota" type="number" name="NEW_'+ ects +'" min="0" max="20"></td><td><button onclick="removeLine('+ id +')" type="button" class="btn btn-danger">X</button></td></tr>');

                $('#novaUCdiv').css("visibility", "hidden");
                $('#criarUCs').prop('checked', false);
            }
    </script>
</body>
</html>
