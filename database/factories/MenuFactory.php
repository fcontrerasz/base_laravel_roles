<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Menu;
use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    $name = $faker->name;
    $menus = App\Menu::all();
    return [
        'nombre' => $name,
        'slug' => str_slug($name),
        'padre' => (count($menus) > 0) ? $faker->randomElement($menus->pluck('id')->toArray()) : 0,
        'orden' => 0
    ];
});