<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(FornecedoreSeeder::class);
        $this->call(siteContatoSeeder::class);
        $this->call(MotivoContatoSeeder::class);
    }
}
