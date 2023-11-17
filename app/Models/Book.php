<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'isbn',
        'description',
        'stock',
        'date_published',
        'publisher',
        'status',
    ];

    public function bookcategory()
    {
        return $this->belongsTo(BookCategory::class,'category_id','id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class,'author_id','id');
    }
}
