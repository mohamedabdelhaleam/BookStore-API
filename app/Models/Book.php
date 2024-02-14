<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $fillable = ['title', 'lang', 'size', 'rate',  'category_id', 'user_id', 'page', 'image', 'created_at'];
    protected $hidden = ['created_at', 'pivot'];

    public $timestamps = true;

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
