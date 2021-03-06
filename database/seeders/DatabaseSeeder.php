<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            OrderStatusSeeder::class,
            UserSeeder::class, // 1 Admin, 2 User w/o Addresses
            AddressSeeder::class, // Admin with address
            ProductSeeder::class, // Products with categories
            PaymentMethodsSeeder::class,
        ]);
    }
}
