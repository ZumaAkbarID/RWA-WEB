<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B_Post extends Model
{
    use HasFactory;
    protected $table = 'b_posts';
    protected $guarded = ['id'];
}