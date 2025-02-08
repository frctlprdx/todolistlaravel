<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    // Menentukan primary key sebagai user_id
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Generate UUID otomatis untuk user_id
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = (string) Str::uuid();
        });
    }

    // Kolom yang dapat diisi mass-assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
    ];

    // Kolom yang tidak perlu ditampilkan secara langsung
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
