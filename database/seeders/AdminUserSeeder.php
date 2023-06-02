<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'first_name'=>'Savji',
            'last_name'=>'Rathod',
            'phone_number'=>'1234567890',
            'mobile_number'=>'0987654321',
            'email'=>'savaji.dkt@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password'=>Hash::make('123456'),
            'user_type'=>1,
            'user_status'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
