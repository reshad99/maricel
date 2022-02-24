<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => 'info@maricel.az',
            'phone' => $this->faker->phoneNumber(),
            'date' => '2022-02-27', // password
            'confirm' => 1,
            'card_id' => 4,
        ];
    }
}
