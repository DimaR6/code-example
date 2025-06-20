<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MagicLink extends Model
{
    public $table = 'magic_links';

    public $fillable = [
        'hash',
        'user_id',
        'expires_at',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static array $rules = [
        'hash' => 'required|unique:magic_links',
        'user_id' => 'required',
        'expires_at' => 'required|date'
    ];

    
}
