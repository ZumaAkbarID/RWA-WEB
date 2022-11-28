<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B_Tag extends Model
{
    use HasFactory;
    protected $table = 'b_tags';
    protected $guarded = ['id'];
}