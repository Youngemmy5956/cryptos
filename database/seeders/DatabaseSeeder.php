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
        // User::factory(10)->create();
        // $this->call(PermissionTableSeeder::class);
        // $this->call(WalletTableSeeder::class);
        // $this->call(CurrencyTableSeeder::class);
        // $this->call(UserTableSeeder::class);
        $this->call(PlanTableSeeder::class);

    }
}
