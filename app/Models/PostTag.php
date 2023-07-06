<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    
    protected $connection = 'pgsql_laravel';
    protected $table = 'post_tags';
    protected $guarded = [];
    
    
}
