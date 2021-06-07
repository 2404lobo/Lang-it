<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class LanguagesTableSeeder extends Seeder{
    public function run(){
        DB::table('languages')->insert([
            'shortname'=>'ENG',
            'fullname'=>'English'
        ]);
        DB::table('languages')->insert([
            'shortname'=>'RUS',
            'fullname'=>'Russian'
        ]);
        DB::table('languages')->insert([
            'shortname'=>'POR',
            'fullname'=>'Portuguese'
        ]);
        DB::table('languages')->insert([
            'shortname'=>'GER',
            'fullname'=>'German'
        ]);
        DB::table('languages')->insert([
            'shortname'=>'ITA',
            'fullname'=>'Italian'
        ]);
    }
}