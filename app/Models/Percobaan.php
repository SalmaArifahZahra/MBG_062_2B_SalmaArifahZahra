<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Percobaan extends Model
{
    // ini contoh dai students model
    // use HasFactory;

    // protected $primaryKey = 'student_id';
    // protected $fillable = [
    //     'nim',
    //     'major',
    //     'entry_year',
    //     'user_id'
    // ];

    // public $timestamps = true;

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'user_id');
    // }

    // // Relationship dengan Courses (many-to-many through takes table)
    // public function courses()
    // {
    //     return $this->belongsToMany(Course::class, 'takes', 'student_id', 'course_id')
    //         ->withPivot('enroll_date')
    //         ->withTimestamps();
    // }
}
