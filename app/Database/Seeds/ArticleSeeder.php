<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class ArticleSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('en_EN');

        for ($i = 0; $i < 50; $i++) {
            $title      = $faker->sentence(6, true);
            $slug       = url_title($title, '-', TRUE);
            $data = [
                'category_id' => $faker->numberBetween(1, 8),
                'image'    => 'https://via.placeholder.com/720x360',
                'title'    => $title,
                'slug'    => $slug,
                'article'    => $faker->paragraph(3, true),
                'user_id'    => $faker->numberBetween(2, 12),
                'status'    => $faker->numberBetween(0, 1),
                'is_delete'    => $faker->numberBetween(0, 1),
                'created_at'    => Time::createFromTimestamp($faker->unixTime),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('articles')->insert($data);
        }
    }
}
