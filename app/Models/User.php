<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use App\Models\Task;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    // UUID sebagai primary key
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Auto generate UUID saat pembuatan user
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->user_id)) {
                $model->user_id = (string) Str::uuid();
            }
        });
    }

    // Field yang bisa diisi (mass assignment)
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
    ];

    // Field yang disembunyikan saat serialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi: satu user bisa punya banyak task
    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id', 'user_id');
    }
}
