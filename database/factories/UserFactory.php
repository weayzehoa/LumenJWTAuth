<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'gender' => mt_rand(1, 2),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$92IXUNpsdO0rOQ5byMi.Ye4oKwea3Ro9llC/.og/at2.uheWG/igi',
            'address' => $this->faker->address,
            'tel' => $this->faker->phoneNumber,
        ];
    }
}
