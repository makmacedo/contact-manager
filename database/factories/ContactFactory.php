<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gender' => $gender = $this->faker->randomElement(['male', 'female']),
            'title' => $this->faker->title($gender),
            'first_name' => $this->faker->firstName($gender),
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'notes' => $this->faker->text(),
            'company_id' => Company::all()->random()->id,
        ];
    }
}
