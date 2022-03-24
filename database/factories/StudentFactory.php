<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\School;

class StudentFactory extends Factory {

    private static $order = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {

        return [
            'name' => $this->faker->name(),
//            'school_id' => $this->faker->randomElement(School::all())['id'],
            'school_id' => School::first()->id,
            'order' => self::$order++,
        ];
    }

}
