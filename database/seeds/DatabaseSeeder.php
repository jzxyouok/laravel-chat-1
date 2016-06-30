<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('users')->delete();
        $data=\App\User::where('email', '=', 'admin@mail.com')->delete();

        DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@mail.com',
        'password' =>  Hash::make('admin'),        
        'avatar' =>  'admin.ico',        
        'active' =>  '1',        
        'created_at' =>  date("Y-m-d H:i:s") ,        
        'updated_at' =>  date("Y-m-d H:i:s"),
        ]);
    }
}
