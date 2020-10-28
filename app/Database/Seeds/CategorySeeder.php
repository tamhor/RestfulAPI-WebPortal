<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class CategorySeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 8; $i++) {
            $title      = $faker->sentence(2, true);
            $slug       = url_title($title, '-', TRUE);
            $data = [
                'title'    => $title,
                'slug'    => $slug,
                'is_delete'    => $faker->numberBetween(0, 1),
                'created_at'    => Time::createFromTimestamp($faker->unixTime),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('categories')->insert($data);
        }
    }
}
