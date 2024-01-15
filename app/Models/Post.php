<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{

    public $directory = "/images/";
    use SoftDeletes;
    use HasFactory;


    protected $dates = ['deleted_at'];

    protected $fillable = [


        'title',
        'content',
        'path'

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class,'imageable');
    }


    public function tags(): MorphToMany
    {
        return$this->morphToMany(Tag::class,'taggable');
    }

    public static function scopeLatest($query){
        return $query->orderBy('id','asc')->get();
    }

    public function getPathAttribute($value){
        return $this->directory.$value;
    }

}
