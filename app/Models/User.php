<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Core\Terceros\Tercero;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
     use HasRoles,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'identificacion',
        'email',
        'password',
        'tercero_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function tercero()
    {
        return $this->belongsTo(Tercero::class, 'tercero_id');
    }

    // traer los tipos del tercero asociado al usuario
    // Helper rápido para traer los "roles" (nombres) del tercero
    public function tiposCodigos(): array
    {
        $this->loadMissing('tercero.tipos:id,nombre');
        return $this->tercero?->tipos
            ->pluck('nombre')                // 'Cliente','Proveedor','Empleado'
            ->map(fn($n) => strtoupper($n))  // CLIENTE, PROVEEDOR, EMPLEADO
            ->values()
            ->all() ?? [];
    }
}
