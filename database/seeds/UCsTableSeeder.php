<?php

use Illuminate\Database\Seeder;

class UCsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ramos')->insert([
            'nome' => "Tronco Comum",
            'curso_id' => "1",
        ]);
        
        DB::table('ramos')->insert([
            'nome' => "Sistemas de Informação",
            'curso_id' => "1",
        ]);

        DB::table('ramos')->insert([
            'nome' => "Tecnologias de Informação",
            'curso_id' => "1",
        ]);

        


        //RAMO COMUM
        $numeroDeCadeiras = 39;
        $nomes = [
            //1 - 1
            "Análise Matemática",
            "Álgebra Linear",
            "Física Aplicada",
            "Programação I",
            "Sistemas Computacionais",
            //1 - 2
            "Matemática Discreta",
            "Estatística",
            "Programação II",
            "Tecnologias de Internet",
            "Sistemas Operativos",
            "Inglês",
            //2 - 1
            "Sistemas Gráficos e Interação",
            "Algoritmos e Estruturas de Dados",
            "Bases de Dados",
            "Redes de Computadores",
            "Programação Avançada",
            //2 - 2
            "Aplicações para a Internet",
            "Engenharia de Software",
            "Inteligência Artificial",
            "Sistemas de Bases de Dados",
            "Segurança da Informação",
            "Tecnologias de Virtualização",
            "Redes de Dados",
            "Administração de Sistemas",
            //3 - 1
            "Desenvolvimento de Aplicações Distribuídas",
            "Integração de Sistemas",
            "Tópicos Avançados de Engenharia de Software",
            "Desenvolvimento de Aplicações Empresariais",
            "Sistemas de Apoio à Decisão",
            "Centros de Processamento de Dados",
            "Tópicos Avançados de Redes",
            "Segurança de Sistemas",
            //3 - 2
            "Projeto Informático",
            "Seminário",
            "Inovação e Empreendedorismo",
            "Engenharia do Conhecimento",
            "Sistemas de Informação Empresariais",
            "Laboratório de Tecnologias de Informação",
            "Engenharia de Sistemas e Serviços",
        ];
        $ects = [
            //1 - 1
            "6",
            "5",
            "6",
            "7",
            "6",
            //1 - 2
            "6",
            "3",
            "7",
            "6",
            "6",
            "2",
            //2 - 1
            "5",
            "6",
            "6",
            "6",
            "7",
            //2 - 2
            "6",
            "6",
            "6",
            "6",
            "6",
            "6",
            "6",
            "6",
            //3 - 1
            "6",
            "6",
            "6",
            "6",
            "6",
            "6",
            "6",
            "6",
            //3 - 2
            "14",
            "3",
            "2",
            "6",
            "5",
            "6",
            "5",

        ];
        $ano = [
            //1 - 1
            "1",
            "1",
            "1",
            "1",
            "1",
            //1 - 2
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            //2 - 1
            "2",
            "2",
            "2",
            "2",
            "2",
            //2 - 2
            "2",
            "2",
            "2",
            "2",
            "2",
            "2",
            "2",
            "2",
            //3 - 1
            "3",
            "3",
            "3",
            "3",
            "3",
            "3",
            "3",
            "3",
            //3 - 2
            "3",
            "3",
            "3",
            "3",
            "3",
            "3",
            "3",

        ];
        $semestre = [
            //1 - 1
            "1",
            "1",
            "1",
            "1",
            "1",
            //1 - 2
            "2",
            "2",
            "2",
            "2",
            "2",
            "2",
            //2 - 1
            "1",
            "1",
            "1",
            "1",
            "1",
            //2 - 2
            "2",
            "2",
            "2",
            "2",
            "2",
            "2",
            "2",
            "2",
            //3 - 1
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            //3 - 2
            "2",
            "2",
            "2",
            "2",
            "2",
            "2",
            "2",
        ];
        $ramo = [
            //1 - 1
            "1",
            "1",
            "1",
            "1",
            "1",
            //1 - 2
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            //2 - 1
            "1",
            "1",
            "1",
            "1",
            "1",
            //2 - 2
            "1",
            "1",
            "2",
            "2",
            "2",
            "3",
            "3",
            "3",
            //3 - 1
            "1",
            "1",
            "2",
            "2",
            "2",
            "3",
            "3",
            "3",
            //3 - 2
            "1",
            "1",
            "1",
            "2",
            "2",
            "3",
            "3",
        ];
        $curso = [
            //1 - 1
            "1",
            "1",
            "1",
            "1",
            "1",
            //1 - 2
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            //2 - 1
            "1",
            "1",
            "1",
            "1",
            "1",
            //2 - 2
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            //3 - 1
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            //3 - 2
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
            "1",
        ];
        for($i = 0; $i < $numeroDeCadeiras; $i++) {
            DB::table('ucs')->insert([
                'nome' => $nomes[$i],
                'ects' => $ects[$i],
                'ano' => $ano[$i],
                'semestre' => $semestre[$i],
                'ramo_id' => $ramo[$i],
                'curso_id' => $curso[$i],
            ]);
        }
        

        
    }
}
