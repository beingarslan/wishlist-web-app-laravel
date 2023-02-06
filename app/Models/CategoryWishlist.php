<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryWishlist extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'wishlist_id',
        'category_id',
        'name',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function wishlist(){
        return $this->belongsTo(Wishlist::class, 'wishlist_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
