<?php

use Illuminate\Database\Seeder;
use App\AppUser;

class AppUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('app_users')->insert([
        // //     'name' => str_random(10),
        // //     'email' => str_random(10).'@gmail.com',
        // //     'status' => str_random(10000000, 99999999),
        // //     'phone' => str_random(10),
        // //     'gender' => str_random(10),
        // //     'membership_start' => str_random(10),

        // ]);

        $users = array(
            ['name' => 'Ryan Chenkie', 'email' => 'ryanchenkie@gmail.com', 'status' => 'Active', 'phone' => '1234567890', 'gender' => 'Male', 'membership_start' => '1-1-11'],
            ['name' => 'Ryan Aplha', 'email' => 'alpha@gmail.com', 'status' => 'Active', 'phone' => '0987654321', 'gender' => 'Female', 'membership_start' => '1-1-12'],
            ['name' => 'Ryan Bravo', 'email' => 'bravo@gmail.com', 'status' => 'Inactive', 'phone' => '1234509876', 'gender' => 'Male', 'membership_start' => '1-1-13'],
            ['name' => 'Ryan Charlie', 'email' => 'charlie@gmail.com', 'status' => 'Active', 'phone' => '6789012345', 'gender' => 'Female', 'membership_start' => '1-1-14'],
            ['name' => 'Ryan Decca', 'email' => 'decca@gmail.com', 'status' => 'Inactive', 'phone' => '6789054321', 'gender' => 'Female', 'membership_start' => '1-1-15'],
            
        );

    // Loop through each user above and create the record for them in the database
    foreach ($users as $user)
    {
        AppUser::create($user);
    }
    }
}
