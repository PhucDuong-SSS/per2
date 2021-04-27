<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
use HasFactory;
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
'user_id', 
'title', 
'content',
'is_active'
];

public function user()
{
return $this->belongsTo(Post::class, 'user_id');
}
}