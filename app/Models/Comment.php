<?php

namespace App\Models;
use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

        protected $fillable=[
        'text','name','course_id','user_id',
        ];
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        public function course()
        {
            return $this->belongsTo(Course::class);
        }
        
}
