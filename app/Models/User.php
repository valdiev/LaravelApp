<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function photos() {
        // SELECT * FROM photos WHERE user_id = $this->id
        return $this->hasMany("App\Models\Photo", "user_id");
    }

    public function IFollowThem() {
        return $this->belongsToMany("App\Models\User", "connexion", "from_id", "to_id");
        // SELECT * FROM uers JOIN connexion ON connexion.to_id=users.id WHERE from_id = $this->id
    }

    public function theyFollowMe() {
        return $this->belongsToMany("App\Models\User", "connexion", "to_id", "from_id");
        // SELECT * FROM uers JOIN connexion ON connexion.from_id=users.id WHERE to_id = $this->id
    }

    public function likes() {
        return $this->hasMany("App\Models\Like");
    }
}
