<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

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
        'is_admin',
        'last_visit',
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

    public function accessTests(){
        return $this->belongsToMany(Test::class, 'access_tests');
    }

    public function inviteTests(){
        return $this->belongsToMany(Test::class, 'invite_tests');
    }

    public function resultTests(){
        return DB::table('users')
            ->join('invite_tests', 'users.id','=','invite_tests.user_id')
            ->join('results', 'results.invite_id','=', 'invite_tests.id')
            ->leftJoin('tests', 'tests.id','=','invite_tests.test_id')
            ->select('tests.*')
            ->distinct()
            ->get();
    }
}
