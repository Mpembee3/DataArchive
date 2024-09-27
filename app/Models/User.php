<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'member_id',
        'email',
        'password',
        'role_id',
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
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relationship with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relationship with Member (supervised members).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supervisor(): HasMany
    {
        return $this->hasMany(Member::class, 'supervisor_id');
    }

    /**
     * Relationship with Member (if the user is also a member).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function member()
    {
        return $this->BelongsTo(Member::class,'member_id');
    }


    public function isDeacon(){

        return $this->role_id == 3;
    }
   
    public function isPastor(){

        return $this->role_id == 2;
    }

    public function isAdmin(){
        
        return $this->role_id == 1;
    }
}
