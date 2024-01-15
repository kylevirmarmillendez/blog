<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function post(): HasOne
    {
        return $this->hasOne(post::class);
    }

    public function posts(): HasMany 
    {
        return $this->hasMany(Post::class);
    }
   

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withPivot('created_at');
    }


public function photos(): MorphMany
{
    return $this->morphMany(Photo::class,'imageable');
}

public function getNameAttribute($value){
    return ucfirst($value);
}

public function setNameAttribute($value){
    $this->attributes['name']=strtoupper($value);
}
}
