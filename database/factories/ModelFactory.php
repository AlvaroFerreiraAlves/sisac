<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'matricula' =>$faker->numberBetween(1,9999999999),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'status' => $faker->boolean,
        'remember_token' => str_random(10),
        'id_curso' => App\Entities\Course::all()->random()->id,
    ];
});

$factory->define(App\Entities\Course::class, function (Faker\Generator $faker) {


    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'carga_horaria_atividades'=>$faker->numberBetween(1,9),
        'status' => $faker->boolean,

    ];
});


$factory->define(App\Entities\Activity::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->name,
        'descricao' => $faker->sentence,
        'documento' =>$faker->sentence,
        'qt_horas' =>$faker->numberBetween(0,12),
        'status' => $faker->boolean,
        'situacao' => $faker->boolean,
        'id_tipo_atividade'=> App\Entities\ActivityType::all()->random()->id,
        'id_usuario'=> App\Entities\User::all()->random()->id,
        'id_curso_usuario'=> App\Entities\User::all()->random()->id,
        'id_regulamento'=> App\Entities\Regulation::all()->random()->id,


    ];
});
$factory->define(App\Entities\ActivityType::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status' => $faker->boolean,
    ];
});
$factory->define(App\Entities\Regulation::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status' => $faker->boolean,
    ];
});
$factory->define(App\Entities\UserType::class, function (Faker\Generator $faker) {


    return [
        'status' => $faker->boolean,
        'nome' => $faker->sentence,
        'descricao' => $faker->sentence,
    ];
});

$factory->define(App\Entities\UserTypesUser::class, function (Faker\Generator $faker) {


    return [
        'id_usuario' => App\Entities\User::all()->random()->id,
        'id_tipo_usuario' => App\Entities\UserType::all()->random()->id,
        'status' => $faker->boolean,
    ];
});



