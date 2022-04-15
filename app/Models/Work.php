<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
        // テーブル名
        protected $table = 'works';

        // 可変項目
        protected $fillable =
        [
            'title',
            'content',
            'url',
            'git_url',
            'img',
            'img_sp',
            'category',
            'top_show',
        ];
}
