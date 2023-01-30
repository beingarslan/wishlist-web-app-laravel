<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\CategoryWishlist;
use App\Helpers\ImageUploadHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'repeat', 'url', 'category_id', 'image'];

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
        $this->attributes['image'] = ImageUploadHelper::uploadImage('wishlists', $value, $this->image, [800, 550]);
    }
}
