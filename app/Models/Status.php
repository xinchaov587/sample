<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // 定义可添加字段
    protected $fillable = ['content'];

    // 将Status模型绑定到User模型
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
