<?php

use Illuminate\Database\Seeder;
use App\Entities\UserType;
use App\Entities\ActivityType;
use App\Entities\Regulation;
use App\Entities\Course;
use App\Entities\Request;

class SisgacDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* factory(App\Entities\Regulation::class,3)->create();

         factory(App\Entities\User::class,5)->create();


         factory(App\Entities\UserTypesUser::class,5)->create();
         factory(App\Entities\Activity::class,10)->create();*/

        UserType::create([
            'nome' => 'Admisnistrador',
            'descricao' => 'admisnistrador',
            'status' => '1',
        ]);

        UserType::create([
            'nome' => 'Professor supervisor',
            'descricao' => 'Professor supervisor',
            'status' => '1',
        ]);

        UserType::create([
            'nome' => 'Coordenador de curso',
            'descricao' => 'Coordenador de curso',
            'status' => '1',
        ]);

        UserType::create([
            'nome' => 'Cores',
            'descricao' => 'Cores',
            'status' => '1',
        ]);

        Regulation::create([
            'nome' => 'REGULAMENTO DE ATIVIDADES COMPLEMENTARES DOS CURSOS DE GRADUAÇÃO PRESENCIAIS DO IFTO',
            'descricao' => 'Aprovado pela Resolução n.º 45/2012/CONSUP/IFTO, de 19 de novembro de 2012, alterado
                            pela Resolução n.º 36/2013/CONSUP/IFTO, de 20 de agosto de 2013 e pela Resolução
                            ad referendum n.º 5/2015/CONSUP/IFTO, de 31 de março de 2015, convalidada pela Resolução
                            n.º 21/2015/CONSUP/IFTO, de 25 de junho de 2015 e alterado pela Resolução n.º
                            3/2016/CONSUP/IFTO, de 24 de fevereiro de 2016.',
            'status' => '1'
        ]);

        ActivityType::create([
            'nome' => 'Atividades de ensino',
            'descricao' => 'Atividades de ensino',
            'status' => '1',
            'qt_min' => '10',
            'id_regulamento' => App\Entities\Regulation::all()->random()->id,
        ]);
        ActivityType::create([
            'nome' => 'Atividades de pesquisa',
            'descricao' => 'Atividades de pesquisa',
            'status' => '1',
            'qt_min' => null,
            'id_regulamento' => App\Entities\Regulation::all()->random()->id,
        ]);

        ActivityType::create([
            'nome' => 'Atividades de extensao',
            'descricao' => 'Atividades de extensao',
            'status' => '1',
            'qt_min' => null,
            'id_regulamento' => App\Entities\Regulation::all()->random()->id,
        ]);

        ActivityType::create([
            'nome' => 'Atividades de socioculturais',
            'descricao' => 'Atividades de socioculturais',
            'status' => '1',
            'qt_min' => '10',
            'id_regulamento' => App\Entities\Regulation::all()->random()->id,
        ]);

        Course::create([
            'nome' => 'Sistemas de Informação',
            'descricao' => 'Sistemas de Informação',
            'carga_horaria_atividades' => '100',
            'status' => '1',
        ]);

        Course::create([
            'nome' => 'Gestão de Tecnologia de Informção',
            'descricao' => 'Gestão de Tecnologia de Informção',
            'carga_horaria_atividades' => '150',
            'status' => '1',
        ]);

        Request::create([
            'name' => 'Maria de Jesus',
            'matricula' => 12345678912345,
            'email' => 'maria@maria.com',
            'password' => bcrypt('123'),
            'status' => 0,
            'remember_token' => str_random(10),
            'id_curso' => App\Entities\Course::all()->random()->id,
        ]);

        Request::create([
            'name' => 'Joao Batista',
            'matricula' => 12345678912348,
            'email' => 'joao@joao.com',
            'password' => bcrypt('123'),
            'status' => 0,
            'remember_token' => str_random(10),
            'id_curso' => App\Entities\Course::all()->random()->id,
        ]);


    }
}
