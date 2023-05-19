<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managerOne = User::create([
            'first_name' => 'ahmed',
            'last_name' => 'ali',
            'email' => 'manager@gmail.com',
            'password' => '$$12345678$$abcdef$$',
            'salary' => '1000.00',
            'image' => 'defaultUser.png'
        ]);
        $managerOne->assignRole('manager');

        $managerTwo = User::create([
            'first_name' => 'sayed',
            'last_name' => 'hamed',
            'email' => 'managerTwo@gmail.com',
            'password' => '$$12345678$$abcdef$$',
            'salary' => '1450.00',
            'image' => 'defaultUser.png'
        ]);
        $managerTwo->assignRole('manager');

        $employee = User::create([
            'first_name' => 'khaled',
            'last_name' => 'gamal',
            'email' => 'employee@gmail.com',
            'password' => '$$12345678$$abcdef$$',
            'salary' => '500.00',
            'image' => 'defaultUser.png',
            'department_id' => 1,
            'manager_id' => 1
        ]);
        $employee->assignRole('employee');
    }
}
