<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", "ID");
    }

    public function address(): HasMany
    {
        return $this->hasMany(Address::class, "contact_id", "id"); // Ubah 'addresses' menjadi 'Address'
    }

    public static function createWithUserId(array $attributes, User $user)
    {
        if ($user) {
            $attributes['user_id'] = $user->user_id; // Sesuaikan dengan nama primary key yang benar

            return self::create($attributes);
        }

        throw new \Exception('User not found.');
    }
}
