<?php

namespace Database\Factories;

use App\Models\Ensaio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnsaioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ensaio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nome = $this->faker->firstNameFemale;
        $sobrenome = $this->faker->lastName;
        $completo = $nome . '' . $sobrenome;
        return [
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'cidadeuf' => $this->faker->city . '-' . $this->faker->state,
            'grau_escolaridade' => $this->faker->randomElement(['cursando', 'incompleto', 'completo']),
            'escolaridade' => $this->faker->randomElement(['fundamental', 'medio', 'superior', 'posGraduacao', 'mestrado', 'doutorado']),
            'graduadoem' => $this->faker->sentence(2),
            'esporte' => $this->faker->randomElement(['Três tambores', 'Ténis', 'Voleibol', 'futebol']),
            'sonho' => $this->faker->catchPhrase,
            'hobby' => $this->faker->sentence(2),
            'frase' => $this->faker->catchPhrase,
            'musica' => $this->faker->catchPhrase,
            'personalidade' => $this->faker->name . ' ' . $this->faker->lastName,
            'prato' => $this->faker->word,
            'ensaio_id' => '123',
            'link' => $this->faker->domainName,
            'facebook' => $completo,
            'instagram' =>'@' . $completo,
            'youtube' => $completo,
            'twitter' => '@' . $completo,
            'linkedin' => $completo,
            'tiktok' => $completo,
        ];
    }
}
