<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            $data = [
                'username' => $faker->name,
                'password'    => sha1('user'),
                'email'    => $faker->email,
                'phone'    => $faker->e164PhoneNumber,
                'role'    => 0,
                'is_delete'    => 0,
                'created_at'    => Time::createFromTimestamp($faker->unixTime),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('users')->insert($data);
        }
    }
}
