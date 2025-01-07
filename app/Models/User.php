<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'tenant_id',
        'shift_id',
        'uu_id',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function shift()
    {
        return $this->hasOne(Shift::class,'id','shift_id');
    }


    public function department()
    {
        return $this->hasOne(Department::class,'id','department_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    public function personalInfo()
    {
        return $this->hasOne(PersonalInfo::class);
    }

    public function contactInfo()
    {
        return $this->hasOne(ContactInfo::class);
    }

    public function jobInfo()
    {
        return $this->hasOne(JobInfo::class);
    }

    public function professionalDetails()
    {
        return $this->hasOne(ProfessionalDetails::class);
    }

    public function compensationInfo()
    {
        return $this->hasOne(CompensationInfo::class);
    }

    public function emergencyContactInfo()
    {
        return $this->hasOne(EmergencyContactInfo::class);
    }

    public function legalCompliance()
    {
        return $this->hasOne(LegalCompliance::class);
    }



    public function healthSafetyInfo()
    {
        return $this->hasOne(HealthSafetyInfo::class);
    }

    public function additionalInfo()
    {
        return $this->hasOne(AdditionalInfo::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function managedProjects()
    {
        return $this->hasMany(Project::class, 'manager_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
