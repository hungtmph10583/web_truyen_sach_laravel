<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'sc_story_id',
        'sc_category_id	'
    ];
    protected $table = 'stories_categories';

    public function category(){
        return $this->belongsTo(Role::class, 'sc_category_id');
    }
}
