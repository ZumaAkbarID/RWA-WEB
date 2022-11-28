<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B_Detail extends Model
{
    use HasFactory;
    protected $table = 'b_details';
    protected $guarded = ['id'];
}