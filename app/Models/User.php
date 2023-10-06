<?php

namespace App\Models;

use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\URL;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'pp',
        'alamat',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function sendPasswordResetNotification($token): void
    {
        $url = URL::signedRoute('password.reset', ['token' => $token]);
        $username = $this->name;
        $this->notify(new CustomResetPasswordNotification($url, $username));
    }

    public function konser(): HasMany
    {
        return $this->hasMany(Konser::class);
    }
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}