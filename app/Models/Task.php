<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'title',
        'description',
        'completed',
        'user_id', // Menambahkan user_id di sini untuk relasi
    ];

    // Menambahkan mutator untuk kolom 'completed' agar menjadi tipe boolean
    protected $casts = [
        'completed' => 'boolean',
    ];

    // Relasi Many-to-One dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}
