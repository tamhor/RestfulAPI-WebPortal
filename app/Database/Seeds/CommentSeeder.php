<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class CommentSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 150; $i++) {
            $title      = $faker->sentence(6, true);
            $slug       = url_title($title, '-', TRUE);
            $data = [
                'article_id' => $faker->numberBetween(1, 50),
                'comment'    => $faker->paragraph(3, true),
                'user_id'    => $faker->numberBetween(2, 12),
                'is_delete'    => $faker->numberBetween(0, 1),
                'created_at'    => Time::createFromTimestamp($faker->unixTime),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('comments')->insert($data);
        }
    }
}
