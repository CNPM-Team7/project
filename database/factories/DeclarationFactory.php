<?php

namespace Database\Factories;

use App\Models\Declaration;
use App\Models\Family;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeclarationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Declaration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $person_id = Person::all()->pluck('id')->toArray();
        return [
            'person_id' => $this->faker->randomElement($person_id),
            'status' => $this->faker->randomElement([-1, 0, 1, 2, 3]),
            'test_result' => $this->faker->randomElement([0, 1, 2, 3]),
            'test_date' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
        ];
    }
}
