<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\CategoryWishlist;
use App\Helpers\ImageUploadHelper;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Wishlist extends Model
{
    use HasFactory;
    public const WISHLIST_PATH = 'wishlists';

    protected $fillable = [
        'name',
        'price',
        'repeat_purchase',
        'url',
        'image',
        'user_id',
    ];

    protected $casts = [
        'repeat_purchase' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsToMany(CategoryWishlist::class);
    }

    public function setImageAttribute($value)
    {
        $extension = $value->getClientOriginalExtension();
        $file_name = Str::random(10) . time() . '.' . $extension;
        $path = Storage::putFileAs(self::WISHLIST_PATH, $value, $file_name);
        $this->attributes['image'] = $path;
    }

    // get image
    public function getImageAttribute()
    {
        if ($this->attributes['image']) {
            return Image::make(Storage::path($this->attributes['image']))->encode('data-url');
        } else
            return asset('assets/img/products/1.png');
    }
}
