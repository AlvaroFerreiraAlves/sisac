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
        'nome' => $faker->name,
        'matricula' =>$faker->numberBetween(1,9),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\Course::class, function (Faker\Generator $faker) {


    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'carga_horaria_atividades'=>$faker->numberBetween(1,9),
        'status' => $faker->boolean,
        'id_instutions' => $faker->numberBetween(1,10),
    ];
});


$factory->define(App\Entities\Activity::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->name,
        'descricao' => $faker->sentence,
        'documento' =>$faker->sentence,
        'qt_horas' =>$faker->numberBetween(0,12),
        'status'=> $faker->numberBetween(0,1),
        'situacao'=>$faker->numberBetween(0,1),
        'activity_types_id'=> $faker->numberBetween(1,100),
        'users_id'=> $faker->numberBetween(1,100),
        'users_courses_id'=> $faker->numberBetween(1,100),
        'regulations_id'=> $faker->numberBetween(1,100),

    ];
});
$factory->define(App\Entities\ActivityType::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status'=> $faker->numberBetween(0,1),
    ];
});
$factory->define(App\Entities\Regulation::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->sentence,
        'status'=> $faker->numberBetween(0,1),
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
        'id_user' => $faker->numberBetween(1,100),
        'id_type_user' => $faker->numberBetween(1,5),
        'status' => $faker->boolean,
    ];
});



