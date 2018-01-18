@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/home.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
<div class="container">
        <h3>Esta calculadora de média tem as seguintes características:</h3>
        <ul>
            <li><h5>Ignora as notas menores que 10.</h5></li>
            <li><h5>Ignora as notas de valores que não sejam inteiros.</h5></li>
            <li><h5>Havendo cursos que mudaram os seus planos curriculares, os alunos que fizeram UC's antigas terão de as adicionar manualmente.</h5></li>
            <li><h5>No fim de fazeres a tua configuração poderás usar a opção de guardar configuração e fazer upload futuramente para novo cálculo.</h5></li>
            <li><h5><b>ATENÇÃO: Guarda a configuração antes de clicares em "Calcular!". Caso contrário terás de preencher tudo novamente.</b></h5></li>
            <!--<li><h5>Se o teu curso não se encontra listado por favor faz o pedido para: joaopedro2484@gmail.com</h5></li>-->
            <li><h5><b>Futuramente haverá (ou não) a opção de importar as notas diretamente vindas da plataforma da escola.</b></h5></li>
        </ul>
    @if(!isset($media))
    <div class="center">
        <div>
            <input type="checkbox" id="checkLoadFile"/>Carregar ficheiro de configuração
            <br><br>
            <div id="divLoadFile">
                <input class="tacenter"  accept=".txt" id="fileToLoad" type="file" />
                <br>
                <input id="btnUpload" disabled class="btn btn-primary " type="button" value="Upload config" onclick="loadTable();">
            </div>
            <br>
        </div>
        
        <div id="divEscolhaManual">
        @if(isset($escolas))
        <select name="escola" class="form-control">
            <option value="">--Escolhe uma escola--</option>
            @if(isset($escolas))
            @foreach ($escolas as $escola => $value)
                @if($escolaId != null && $escolaId == $escola)
                    <option value="{{ $escola }}" selected> {{ $value }}</option>
                @else
                <option value="{{ $escola }}"> {{ $value }}</option>
                @endif
            @endforeach
            @endif
        </select>

        <select name="curso" class="form-control">
            <option value="">--Curso--</option>
            @if(isset($cursos))
            @if($cursos != null) {
                @foreach ($cursos as $curso => $value)
                    @if($cursoId != null && $cursoId == $curso)
                        <option value="{{ $curso }}" selected> {{ $value }}</option>
                    @else
                    <option value="{{ $curso }}"> {{ $value }}</option>
                    @endif
                @endforeach
            @endif
            @endif
            }
        </select>
        
        @if(isset($ramos) && $ramos != null)
        <select name="ramo" class="form-control">
            <option value="">--Ramo--</option>
                @foreach ($ramos as $ramo => $value)
                    @if($value != "Tronco Comum")
                    @if(isset($ramoId) && $ramoId != null && $ramoId == $ramo)
                        <option value="{{ $ramo }}" selected> {{ $value }}</option>
                    @else
                    <option value="{{ $ramo }}"> {{ $value }}</option>
                    @endif
                    @endif
                @endforeach
            }
        </select>
        @endif
        </div>
        <div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
        <br>
        @if(isset($ucs))
        <input type="checkbox" id="criarUCs">Adicionar nova uc<br>
        <div id="novaUCdiv" class="novaUCdiv">
                <form class="form-inline" action="javascript:void(0);" onsubmit="return validateFormOnSubmit(this);">
                    <div class="form-group">
                        <label for="name">Nome da UC:</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="ects">ECTS da UC:</label>
                        <input type="number" class="form-control" id="ects">
                    </div>
                    <div class="form-group">
                        <label for="id">ID(2000-2050):</label>
                        <input type="number" class="form-control" id="id">
                    </div>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                    </form>
        </div>
        @endif
        <br>
        
        <div id="tabela">
            {{Form::open(array('route' => 'calcularMedia')) }}
            {{Form::token() }}
                <table id="myTable">
                    @if(isset($ucs))
                    @if($ucs!=null)
                    <tr>
                        <th>ID</th>
                        <th>Ano/Semestre - Ramo</th>
                        <th>Unidade Curricular</th>
                        <th>ECTS</th>
                        <th>Nota (0-20)</th>
                        <th>Remover</th>
                    </tr>
                    
                    @foreach($ucs as $uc)
                        <tr id="row{{$uc->id}}">
                            <td>{{ $uc->id}}</td>
                            <td>{{ $uc->ano}}º Ano / {{ $uc->semestre }}º Semestre   -   Ramo: {{$uc->ramo->nome}}</td>
                            <td>{{ $uc->nome}}</td>
                            <td>{{ $uc->ects}} ECTS</td>
                            <td><input id="nota" class="nota" type="number" name="{{$uc->id}}" min="0" max="20"></td>
                            <td><button onclick="removeLine({{$uc->id}})" type="button" class="btn btn-danger">X</button></td>
                        </tr>
                    @endforeach

                    @endif
                    @endif
                    
                </table>
                <br>
                
                {{Form::submit('Calcular!', array('class' => 'btn btn-primary', 'id' => 'btnCalcular'))}}
            {{ Form::close() }}
            <br>
            <h3>Guardar ficheiro de configuração:</h3>
            <input class="btn btn-default" type="button" value="Download" onclick="saveTable();">
        </div>
        @endif
        @endif
        @if(isset($media))
            <div class="middle">
                <h1>Média: {{$media}}</h1>
                <h2>Total de créditos contabilizados: {{$totalECTS}}</h2>
                <br>
                <button onclick="history.go(-1)" type="button" class="btn btn-success">Voltar</button>
            </div>
        @endif
        
        
              


        </div>
</div>
@endsection