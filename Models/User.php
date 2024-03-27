<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tb_user';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'ID',
        'name',
        'username',
        'password',
    ];

    // Definisikan metode createWithUserId untuk membuat kontak baru
    public function createWithUserId(array $attributes)
    {
        // Gunakan metode create pada relasi contact untuk membuat kontak baru
        return $this->contact()->create($attributes);
    }

    // Definisikan relasi dengan model Contact
    public function contact()
    {
        // Hubungkan User dengan Contact melalui relasi hasMany
        return $this->hasMany(Contact::class, 'user_id', 'user_id');
    }
}
