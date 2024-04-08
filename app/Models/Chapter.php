<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'content',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function theme()
    {
        return $this->hasMany(Theme::class);
    }
}
