<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'c_name', 'c_slug', 'c_status'
    ];
    protected $table = 'categories';

    const STATUS_DEFAULT = 0;
    const STATUS_WAITING = 1;
    const STATUS_PROCESS = 2;
    const STATUS_SUCCESS = 3;
    const STATUS_CHECK   = 4;

    public $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Default',
            'class' => 'secondary'
        ],
        self::STATUS_WAITING => [
            'name' => 'Waiting',
            'class' => 'warning'
        ],
        self::STATUS_PROCESS => [
            'name' => 'Process',
            'class' => 'info'
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Success',
            'class' => 'success'
        ],
        self::STATUS_CHECK => [
            'name' => 'Error',
            'class' => 'danger'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->c_status,[]);
    }

    public function stories()
    {
        return $this->belongsToMany(Story::class, 'stories_categories', 'sc_category_id', 'sc_story_id');
    }

    public function storyCategory()
    {
        return $this->hasMany(StoryCategory::class, 'sc_story_id');
    }
}
