<?php

// app/Models/Address.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'city',
        'province',
        'country',
        'postal_code',
    ];

    // Definisikan relasi dengan model Contact
    // Definisikan relasi dengan model Contact
    public function contact(): BelongsTo
    {
    return $this->belongsTo(Contact::class, "contact_id", "id");
    }

}
