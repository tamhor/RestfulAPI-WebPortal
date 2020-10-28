<?php

namespace App\Database\Seeds;

class Seeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('ArticleSeeder');
        $this->call('CategorySeeder');
        $this->call('CommentSeeder');
    }
}
