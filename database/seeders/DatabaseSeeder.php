<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User as UserEloquent;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        //建立一筆使用者
        UserEloquent::create([
            'name' => '使用者',
            'gender' => 1,
            'email' => 'user@mail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => app('hash')->make('user'),
            'address' => '地球',
            'tel' => '0123456789',
        ]);
        //建立一筆訪客
        UserEloquent::create([
            'name' => '訪客',
            'gender' => 2,
            'email' => 'guest@mail.com',
            'password' => app('hash')->make('user'),
            'address' => '火星',
            'tel' => '9876543210',
        ]);
        //在users資料表建立18筆
        UserEloquent::factory()->count(18)->create();
    }
}
