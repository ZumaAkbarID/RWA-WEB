<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B_Comment extends Model
{
    use HasFactory;
    protected $table = 'b_comments';
    protected $guarded = ['id'];
}