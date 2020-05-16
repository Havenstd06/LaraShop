<?php

use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code'          => '90off',
            'percent_off'   => '90',
        ]);

        Coupon::create([
            'code'          => '50off',
            'percent_off'   => '50',
        ]);

        Coupon::create([
            'code'          => '40off',
            'percent_off'   => '40',
        ]);

        Coupon::create([
            'code'          => '20off',
            'percent_off'   => '20',
        ]);

        Coupon::create([
            'code'          => '10off',
            'percent_off'   => '10',
        ]);
    }
}
