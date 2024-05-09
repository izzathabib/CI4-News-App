<?php

namespace App\Models;
// This is the database library
use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    /**
     * @param false|string $slug // Store specific news item
     *
     * @return array|null
     */
    public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}