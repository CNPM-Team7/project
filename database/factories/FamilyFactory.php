<?php

namespace Database\Factories;

use App\Models\Family;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Family::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $person_id = Person::all()->pluck('id')->toArray();
        return [
            'owner_id' => $this->faker->randomElement($person_id),
            'house_id' => $this->faker->numerify('###'),
            'address' => $this->faker->address,
        ];
    }
}
