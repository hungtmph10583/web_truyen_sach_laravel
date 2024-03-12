<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'c_name',
        'c_slug',
        'c_story_id',
        'c_content',
    ];
    protected $table = 'chapters';

    public function story()
    {
        return $this->belongsTo(Story::class, 'c_story_id');
    }
}
