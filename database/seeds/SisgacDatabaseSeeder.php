<?php

use Illuminate\Database\Seeder;

class SisgacDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Entities\Regulation::class,3)->create();
        factory(App\Entities\Course::class,5)->create();
        factory(App\Entities\User::class,5)->create();
        factory(App\Entities\ActivityType::class,4)->create();
        factory(App\Entities\UserType::class,4)->create();
        factory(App\Entities\UserTypesUser::class,5)->create();
        factory(App\Entities\Activity::class,10)->create();




    }
}
