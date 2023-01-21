<?php

namespace Database\Factories;

use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembayaranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pembayaran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array_gender = ['male', 'female'];
        $gender = $array_gender[array_rand($array_gender)];
        $array_zis = ['zakat', 'infaq', 'sedekah'];
        $array_jenis_zis = ['zakat_penghasilan', 'dompet_yatim', 'sedekah_baznas'];
        $array_bank  = ['BRI','BCA','MANDIRI'];
        return [
            'zis' => $array_zis[array_rand($array_zis)],
            'jenis_zis' => $array_jenis_zis[array_rand($array_jenis_zis)],
            'sapaan' => $gender === 'male' ? 'bapak' : 'ibu',
            'nama_pengirim' => $this->faker->name($gender),
            'no_pengirim' => $this->faker->e164PhoneNumber(62),
            'email_pengirim' => $this->faker->safeEmail(),
            'nominal' => $this->faker->randomNumber(6, true),
            'nama_bank' => $array_bank[array_rand($array_bank)],
            'nama_rek_bank' => $array_bank[array_rand($array_bank)],
            'no_rek_bank' => $this->faker->creditCardNumber('Visa'),
            'bukti_pembayaran' => mt_rand(1,4).'.jpg',
        ];
    }
}
