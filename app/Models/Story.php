<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Arr;
use App\Models\StoryCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Story extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        's_name',
        's_slug',
        's_thumbnail',
        's_type_id',
        's_author_id',
        's_status',
        's_description',
        's_view',
        's_favourite',
        'vote_number',
        'vote_total',
        's_hot',
    ];
    protected $table = 'stories';

    const STATUS_DEFAULT = 0;
    const STATUS_WAITING = 1;
    const STATUS_PROCESS = 2;
    const STATUS_COMPLETE = 3;
    const STATUS_ERROR = 4;

    public $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Đang tiến hành',
            'class' => 'warning'
        ],
        self::STATUS_WAITING => [
            'name' => 'Waiting',
            'class' => 'focus'
        ],
        self::STATUS_PROCESS => [
            'name' => 'Process',
            'class' => 'info'
        ],
        self::STATUS_COMPLETE => [
            'name' => 'Đã hoàn thành',
            'class' => 'success'
        ],
        self::STATUS_ERROR => [
            'name' => 'Error',
            'class' => 'danger'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->s_status,[]);
    }

    public function getTypes()
    {
        return Arr::get($this->types, $this->s_type_id,[]);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'stories_categories', 'sc_story_id', 'sc_category_id');
    }

    public function storyCategory()
    {
        return $this->hasMany(StoryCategory::class, 'sc_story_id');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 's_author_id');
    }

    public function chapter()
    {
        return $this->hasMany(Chapter::class, 'c_story_id');
    }
}
