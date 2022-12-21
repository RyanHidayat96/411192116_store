<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_barang' => $this->faker->numerify('kd-####'),
            'nama_barang' => $this->faker->name,
            'deskripsi' => $this->faker->text,
            'stok_barang' => $this->faker->randomDigitNot(0),
            'harga_barang' => $this->faker->randomNumber(6, true),
        ];
    }
}
