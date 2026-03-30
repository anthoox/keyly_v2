<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Permitimos que estos campos se rellenen masivamente
    protected $fillable = ['user_id', 'name', 'icon', 'color'];

    /**
     * Una categoría pertenece a un usuario.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Una categoría tiene muchas credenciales (servicios).
     */
    public function credentials(): HasMany
    {
        return $this->hasMany(Credential::class);
    }

}