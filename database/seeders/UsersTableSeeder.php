<?php
namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder{
    public function run(){
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name'=>'Carlo Noll',
            'email'=>'carloernst.rosselet@gmail.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('8pa!seKp2S^XWuYyVEFzH%e4'),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('translations')->insert([
            'title'=>'My First Translation',
            'message'=>'First translation i order from this website',
            'duedate'=>now(),
            'progress'=>50,
            'wordcount'=>200,
            'translatorid'=>1,
            'requestedby'=>2,
            'originlanguage'=>2,
            'finallanguage'=>4,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
