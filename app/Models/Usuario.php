<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens; // Si planeas usar autenticación API
use Laravel\Fortify\TwoFactorAuthenticatable; // Para autenticación de dos factores
use Laravel\Jetstream\HasProfilePhoto; // Para fotos de perfil

class Usuario extends Authenticatable
{
    use Notifiable;
    use HasApiTokens; // Descomentar si usas autenticación API
    use HasProfilePhoto; // Si deseas manejar fotos de perfil
    use TwoFactorAuthenticatable; // Para autenticación de dos factores

    protected $table = 'usuario'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idUsuario'; // Clave primaria

    protected $fillable = [
        'DNI',
        'password', // Asegúrate de incluir el campo password
    ];

    protected $hidden = [
        'password', // Este campo debería estar aquí
        'remember_token', // Opcional, si usas remember token
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    public $timestamps = true; // Para manejar timestamps

    // Mutador para el password
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password); // Usar Hash::make
    }

    // Accesor para URL de la foto de perfil
    public function getProfilePhotoUrlAttribute()
    {
        // Lógica para obtener la URL de la foto de perfil
        return asset('path/to/profile/photos/' . $this->DNI . '.jpg'); // Cambia según tu lógica
    }

    // Obtener los atributos que deben ser casteados
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Si decides incluir verificación de email
            'password' => 'hashed', // Almacenamiento seguro de contraseñas
        ];
    }
}
