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

    public const AVATAR_PATH = 'storage/avatars';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
        // $temp_name = Str::random(10) . time() . '.' . $value->getClientOriginalExtension();
        // $path = Storage::putFileAs(self::AVATAR_PATH, $value, $temp_name);
        // $this->attributes['avatar'] = $path;
        $this->attributes['avatar'] = ImageUploadHelper::uploadImage('wishlists', $value, $this->image, [800, 550]);
    }

    // set cover image attribute
    public function setCoverImageAttribute($value)
    {
      // dd($value);
      // get extension from base64 image
      $extension = explode('/', mime_content_type($value))[1];

        $temp_name = Str::random(10) . time() . '.' . $extension;
        // dd($temp_name);
        $path = Storage::putFileAs(self::AVATAR_PATH, $value, $temp_name);
        // $this->attributes['cover_image'] = $path;
        // $png_url = "Image-".time().".png";
        // $path = public_path().'img/designs/' . $png_url;
        // dd($path);
        $this->attributes['cover_image']=Image::make(file_get_contents($value))->save($path);
        // $this->attributes['cover_image'] = ImageUploadHelper::uploadImage('wishlists', $value, $this->image, [800, 550]);

       
        $this->attributes['cover_image'] = $path;



    }

    // public function getAvatarUrlAttribute()
    // {
    //     // avatar_url
    //     if ($this->attributes['avatar']) {
    //         return Image::make(Storage::path($this->attributes['avatar']))->encode('data-url');
    //     }
    //     return asset('images/portrait/small/avatar-s-10.jpg');
    // }



    // get cover image attribute
    public function getCoverImageUrlAttribute()
    {
        // cover_image_url
        if ($this->attributes['cover_image']) {
            return Image::make(Storage::path($this->attributes['cover_image']))->encode('data-url');
        }
        return asset('images/portrait/small/avatar-s-10.jpg');
    }

    public function getAvatarPathAttribute()
    {
        // avatar_path
        if ($this->attributes['avatar']) {
            return Storage::path($this->attributes['avatar']);
        }
        return asset('images/portrait/small/avatar-s-10.jpg');
    }

    // get cover image path attribute
    public function getCoverImagePathAttribute()
    {
        // cover_image_path
        if ($this->attributes['cover_image']) {
            return Storage::path($this->attributes['cover_image']);
        }
        return asset('images/portrait/small/avatar-s-10.jpg');
    }



    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
