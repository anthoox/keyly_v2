<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;

class Credential extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'service_name',
        'encrypted_username',
        'encrypted_password',
        'url',
        'notes'
    ];

    /**
     * Relaciones: Pertenece a un usuario y a una categoría.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * ACCESORS: Estos métodos automágicos desencriptan los datos
     * cuando los llamas desde la vista.
     */
    public function getUsernameAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return $value; // Si no está encriptado o hay error, devuelve el original
        }
    }

    /**
     * Accesor para Password: Desencripta la columna 'password' de la DB
     */
    public function getPasswordAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            return '********';
        }
    }
}
