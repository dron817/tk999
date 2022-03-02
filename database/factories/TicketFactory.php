<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'trip_id' => $this->faker->numberBetween(1, 20),
            'date' => str_pad(rand(1,10), 2, "0", STR_PAD_LEFT).'.03.'.'2022',
            'place' => rand(1,20),
            'fio' => $this->faker->name,
            'doc' => Str::random(10),
            'phone' => '8'.rand(9000000000, 9999999999),
            'tariff' => rand(0,1),
            'address' => 'address: '.$this->faker->name,
        ];
    }
}
