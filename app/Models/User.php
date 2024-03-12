<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'avatar',
        'default_avatar',
        'last_login',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const STATUS_DEFAULT  = 0;
    const STATUS_ACTIVE   = 1;
    const STATUS_INACTIVE = 2;

    public $_status = [
        self::STATUS_DEFAULT => [
            'name' => '[N\A]',
            'class' => 'secondary'
        ],
        self::STATUS_ACTIVE => [
            'name' => 'Active',
            'class' => 'success'
        ],
        self::STATUS_INACTIVE => [
            'name' => 'Inactive',
            'class' => 'danger'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->_status, $this->status,[]);
    }
}
