<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Models\SecurityQuestion;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'security_question_1_id', 
        'security_answer_1', 
        'security_question_2_id', 
        'security_answer_2', 
        'security_question_3_id', 
        'security_answer_3',
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
    ];

    public function secretarias()
    {
        return $this->hasMany(Secretaria::class);
    }

    public function securityQuestion1()
    {
        return $this->belongsTo(SecurityQuestion::class, 'security_question_1_id');
    }

    public function securityQuestion2()
    {
        return $this->belongsTo(SecurityQuestion::class, 'security_question_2_id');
    }

    public function securityQuestion3()
    {
        return $this->belongsTo(SecurityQuestion::class, 'security_question_3_id');
    }
}