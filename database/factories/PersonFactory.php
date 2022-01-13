<?php

namespace Database\Factories;

use App\Models\Family;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'birthday' => $this->faker->dateTimeBetween('1952-01-01', '2022-01-01'),
            'birth_place' => $this->faker->address(),
            'sex' => $this->faker->randomElement(['male' => 0, 'female' => 1]),
            'race' => $this->faker->randomElement(['Kinh', 'Tày', 'Mường', 'Dao']),
            'job' => $this->faker->jobTitle(),
            'work_place' => $this->faker->address(),
            'id_number'=> $this->faker->numerify('#####'),
            'idn_receive_place' => $this->faker->address,
            'idn_receive_date'=> $this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'register_place' => $this->faker->address,
            'register_date' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31'),
            'owner_relation' => $this->faker->randomElement(['Con', 'Vợ', 'Cháu', 'Chăt']),
            'status' => $this->faker->randomElement([0, 1, 2, 3]),
        ];
    }
}
