<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PelangganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelanggan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_pelanggan' => $this->faker->numerify('pl-####'),
            'nama_pelanggan' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'nama_kota' => $this->faker->city(),
            'no_telepon' => $this->faker->phoneNumber(),
        ];
    }
}
