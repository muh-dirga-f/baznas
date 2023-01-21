<?php

namespace Database\Factories;

use App\Models\Konfirmasi;
use Illuminate\Database\Eloquent\Factories\Factory;

class KonfirmasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Konfirmasi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $index = 1;
        $array_status = ['pending', 'confirm', 'reject'];
        return [
            'pembayaran_id' => $index++,
            'status' => $array_status[array_rand($array_status)],
        ];
    }
}
