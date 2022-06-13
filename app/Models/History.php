<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'news_id'
    ];
}
