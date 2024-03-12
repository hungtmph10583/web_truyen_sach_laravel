<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'a_name', 'a_slug', 'a_status'
    ];
    protected $table = 'authors';

    public function stories()
    {
        return $this->hasMany(Story::class, 's_author_id');
    }
}
