<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormApi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'api_key'];

    /**
     * Relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);  // Setiap form API dimiliki oleh satu pengguna
    }
}
