<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([LanguagesTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
    }
}
