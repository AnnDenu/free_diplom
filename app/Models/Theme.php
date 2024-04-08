<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_id',
        'name',
        'type_work',
        'content',
        'document',
    ];
    public function setDocument($document)
    {
        $this->attributes['document'] = $document;
    }
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
