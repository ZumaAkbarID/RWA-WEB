<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicVisitor extends Model
{
    use HasFactory;

    protected $table = 'visitor_public';
    protected $guarded = ['id'];
}