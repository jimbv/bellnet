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
        $this->call(ProvinciaSeeder::class);
        $this->call(LocalidadSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(PermissionInfoSeeder::class);
         
    }
}
