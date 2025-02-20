<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'image', 'author_id', 'student_id'];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id' ,'id');
    }
}
