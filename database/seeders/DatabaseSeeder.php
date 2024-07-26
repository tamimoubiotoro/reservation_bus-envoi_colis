

<?php

// namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Le nom du modèle correspondant à cette fabrique.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Définition du modèle par défaut de la fabrique.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Mot de passe par défaut
            'remember_token' => Str::random(10),
        ];
    }
}
