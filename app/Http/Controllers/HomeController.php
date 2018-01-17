<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Escola;
use App\Curso;
use App\UC;
class HomeController extends Controller
{
    public function index()
    {
        $escolas = Escola::pluck('nome', 'id');
        $ucs = null;
        $escolaId = null;
        $cursoId = null;
        $cursos = null;
        $totalUCs = null;
		return view('home', compact('escolas', 'ucs', 'escolaId', 'cursoId', 'cursos', 'totalUCs'));
    }
    
    public function getCursos($id) {
        $cursos = Escola::find($id)->cursos->pluck('nome', 'id');
        return json_encode($cursos);
    }

    public function getUCs($id) {
        $ucs = Curso::find($id)->ucs;
        $escolas = Escola::pluck('nome', 'id');
        $escolaId = Curso::find($id)->escola->id;
        $cursos = Escola::find($escolaId)->cursos->pluck('nome', 'id');
        $cursoId = $id;
        $totalUCs = count($ucs);
        return view('home', compact('escolas', 'ucs', 'escolaId', 'cursoId', 'cursos', 'totalUCs'));
        //return $ucs;
    }

    public function calcularMedia(Request $request) {
        $notas = [];
        $ects = [];
        $input = $request->all();
        //dd($input);
        $i = 0;
        foreach($input as $linha => $nota) {
            //Quando é uma UC inserida pelo utilizador vem com o nome NEW_creditos
            if (strpos($linha, "NEW_") === 0) {
                if($nota >= 10) {
                    $arr = explode('NEW_', $linha);
                    $creditos = $arr[1];
                    $notas[$i] = $nota;
                    $ects[$i] = $creditos;
                    $i++;
                }
            } else if(is_int($linha)) {
                if($nota >= 10) {
                    $notas[$i] = $nota;
                    $ects[$i] = UC::find($linha)->ects;
                    $i++;
                }
            }
            
        }
        
        $somatorio = 0;
        $totalECTS = 0;
        for($j=0; $j<$i; $j++) {
            $somatorio += $notas[$j] *$ects[$j];
            $totalECTS += $ects[$j];
        }
        if($totalECTS > 0) {
            $media = $somatorio/$totalECTS;
        } else {
            $media = "Não foi possível calcular a média";
        }
        

        return view('home', compact('media', 'totalECTS'));
    }


}
