<?php

namespace Piyush\LaravelLayouts\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Piyush\LaravelLayouts\Notifications\ResetPasswordNotification;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admins';
    protected $primarykey = 'id';
    public $token;
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

}
