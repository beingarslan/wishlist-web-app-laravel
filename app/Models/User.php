<?php

namespace App\Models;

use App\Models\Wishlist;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ImageUploadHelper;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Termwind\Components\Dd;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public const AVATAR_PATH = 'avatars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'email',
        'password',
        'avatar',
        'cover_image',
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


    public function setAvatarAttribute($value)
    {
        $extension = explode('/', mime_content_type($value))[1];
        $temp_name = Str::random(10) . time() . '.' . $extension;
        $path = Storage::putFileAs(self::AVATAR_PATH, $value, $temp_name);
        $this->attributes['avatar'] = $path;
    }

    // set cover image attribute
    public function setCoverImageAttribute($value)
    {
        $extension = explode('/', mime_content_type($value))[1];
        $temp_name = Str::random(10) . time() . '.' . $extension;
        $path = Storage::putFileAs(self::AVATAR_PATH, $value, $temp_name);
        $this->attributes['cover_image'] = $path;
    }

    // get cover image attribute
    public function getCoverImageAttribute()
    {
        if ($this->attributes['cover_image']) {
            return Image::make(Storage::path($this->attributes['cover_image']))->encode('data-url');
        }
        return asset('assets/img/backgrounds/1.jpg');
    }

    public function getAvatarAttribute()
    {
        if ($this->attributes['avatar']) {
            return Image::make(Storage::path($this->attributes['avatar']))->resize(200,200)->encode('data-url');
        }
        return asset('assets/img/avatars/1.png');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
