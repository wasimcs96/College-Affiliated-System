<?php

namespace App\Models;
use App\Models\Method\RoleMethod;
use App\Models\Method\UserMethod;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable, HasRoles,UserMethod;

    const NOT_ACTIVE = 'not_active';
    const ACTIVE = 'active';

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'email',
        'status',
        'address',
        'birth_year',
        'image',
        'original_image_path',
        'password',
        'address_1',
        'address_2'

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function consultant()
    {
        return $this->hasOne(Consultant::class);
    }

    public function university()
    {
        return $this->hasOne(University::class);
    }

    public function universityConsultantClient()
    {
        return $this->hasMany(UniversityConsultantClient::class);
    }
}
