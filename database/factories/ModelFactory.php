<?php


$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'sAMAccountName' => $faker->word,
        'password' => bcrypt($faker->password),
        'remember_token' => Str::random(10),
        'isworkerid' => function () {
             return factory(App\Worker::class)->create()->id;
        },
        'email' => $faker->safeEmail,
    ];
});

$factory->define(App\Team::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});


$factory->define(App\Quarter::class, function (Faker\Generator $faker) {
    return [
        //$table->unique(['year', 'q']); added in migration
        'year'=> $faker->numberBetween(2015, 2020),
        'quarterenddate'=> null,
        'q'=> $faker->numberBetween(1, 4),
        'confirmedstate'=> $faker->numberBetween(0, 3),

    ];
});

$factory->define(App\Contractmodel::class, function (Faker\Generator $faker) {
    
    $work=$faker->numberBetween(0,320);
    return [
        'name' => 'A'.$faker->numberBetween(1,15),
        'manhoursinamonth' => $work,
        'manmonthsinaquarter' => ($work*4),
        'timescale' => $faker->randomFloat(),
    ];
});



$factory->define(App\Projecttype::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    $kt = App\Kostentraeger::all()->pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'shortdescription' => $faker->text,
        'projecttypeid' => function () {
             return factory(App\Projecttype::class)->create()->id;
        },
        'ktid' => $faker->randomElement($kt),
    ];
});

$factory->define(App\Worker::class, function (Faker\Generator $faker) {

    $teams = App\Team::all()->pluck('id')->toArray();
    $ctm = App\Contractmodel::all()->pluck('id')->toArray();

    return [
        'lastname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'email' => $faker->safeEmail,
        'teamid' => $faker->randomElement($teams),
        'contractmodelid' => $faker->randomElement($ctm)
          
    ];
});

$factory->define(App\Qes::class, function (Faker\Generator $faker) {
    
    $quarters = App\Quarter::all()->pluck('id')->toArray();
    $workers = App\Worker::all()->pluck('id')->toArray();

    $projects = App\Project::all()->pluck('id')->toArray();


    return [
        'workerid' => $faker->randomElement($workers),
        'contractmodelid' => function () {
             return factory(App\Contractmodel::class)->create()->id;
        },
        'quarterid' => $faker->randomElement($quarters),//Need Quarter model
        'confirmedstate' => $faker->numberBetween(0, 3),
        'desiredstate' => $faker->randomFloat(2, 0, 300),
        'actualstate' => $faker->randomFloat(2, 0, 300),
        'projectid' => $faker->randomElement($projects),
    ];
});

$factory->define(App\Kostentraeger::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'nummer' => $faker->word,
        'budget' => $faker->randomFloat(),
    ];
});
