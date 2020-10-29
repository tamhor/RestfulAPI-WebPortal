<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticlesModel extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_id', 'image', 'title', 'slug', 'article', 'user_id', 'status'];
}
