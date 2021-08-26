<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);

        $user = User::create([
            'name'          => 'Ghost',
            'email'         => 'ghost@renegade.io',
            'password'      => bcrypt('testing'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user->assignRole('Admin');

        $user2 = User::create([
            'name'          => 'Teacher',
            'email'         => 'teacher@renegade.io',
            'password'      => bcrypt('testing'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user2->assignRole('Teacher');

        $user3 = User::create([
            'name'          => 'Parent',
            'email'         => 'parent@renegade.io',
            'password'      => bcrypt('testing'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user3->assignRole('Parent');

        $user4 = User::create([
            'name'          => 'Student',
            'email'         => 'student@renegade.io',
            'password'      => bcrypt('testing'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user4->assignRole('Student');


        DB::table('teachers')->insert([
            [
                'user_id'           => $user2->id,
                'gender'            => 'male',
                'phone'             => '0123456789',
                'dateofbirth'       => '1993-04-11',
                'current_address'   => '5, somestreet, someState',
                'permanent_address' => '5, somestreet, someState',
                'created_at'        => date("Y-m-d H:i:s")
            ]
        ]);

        DB::table('parents')->insert([
            [
                'user_id'           => $user3->id,
                'gender'            => 'male',
                'phone'             => '0123456789',
                'current_address'   => '5, somestreet, someState',
                'permanent_address' => '5, somestreet, someState',
                'created_at'        => date("Y-m-d H:i:s")
            ]
        ]);

        DB::table('grades')->insert([
            'teacher_id'        => 1,
            'class_numeric'     => 1,
            'class_name'        => 'One',
            'class_description' => 'class one'
        ]);

        DB::table('students')->insert([
            [
                'user_id'           => $user4->id,
                'parent_id'         => 1,
                'class_id'          => 1,
                'roll_number'       => 1,
                'gender'            => 'male',
                'phone'             => '0123456789',
                'dateofbirth'       => '2002-10-08',
                'current_address'   => '5, somestreet, someState',
                'permanent_address' => '5, somestreet, someState',
                'created_at'        => date("Y-m-d H:i:s")
            ]
        ]);

    }
}
