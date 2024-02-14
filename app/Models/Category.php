<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['title', 'created_at'];
    protected $hidden = ['created_at' , 'pivot'];

    public $timestamps = true;


    public function Books()
    {
        return $this->hasMany(Book::class, 'category_id', 'id');
    }
}
