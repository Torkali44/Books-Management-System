<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;
    
    protected $fillable = ['first_name', 'last_name', 'image']; // لا تحتاج book_id هنا

    public function books()
    {
        return $this->hasMany(Book::class, 'author_id'); // علاقة واحد لمجموعة
    }
}


