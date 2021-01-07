<?php

namespace App\Models;
use App\Models\Method\RoleMethod;
use App\Models\Method\UserMethod;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use App\Models\UniversityConsultantClient;
use App\Models\Order;
class User extends Authenticatable
{
    use Notifiable, HasRoles,UserMethod;

    const NOT_ACTIVE = 'not_active';
    const ACTIVE = 'active';

    protected $table = 'users';

    use softDeletes;

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
        'address_2',
        'landline_1',
        'landline_2',
        'latitude',
        'longitude',
        'city',
        'country'

    ];

    protected $dates = ['deleted_at'];

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

    public function universityCourse()
    {
        return $this->hasMany(UniversityCourse::class,'user_id');
    }

    public function universityMedia()
    {
        return $this->hasMany(UniversityMedia::class,'user_id');
    }

    public function universityConsultants()
    {
        return $this->hasMany(UniversityConsultant::class,'university_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function universityConsultantClient()
    {
        return $this->hasMany(UniversityConsultantClient::class,'user_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function consultantPrMigrationCountry()
    {
        return $this->hasOne(ConsultantPrMigrationCountry::class,'user_id');
    }

    public function consultantUniversities()
    {
        return $this->hasMany(UniversityConsultant::class,'consultant_id');
    }

    public function consultantUniversityClient()
    {
        return $this->hasMany(UniversityConsultantClient::class,'consultant_id');
    }

    public function consultantSlots()
    {
        return $this->hasMany(ConsultantAvailableSlots::class,'consultant_id');
    }

    public function consultantApplications()
    {
        return $this->hasMany(Application::class,'consultant_id');
    }
}
