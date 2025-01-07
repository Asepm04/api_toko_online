<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CartModel extends Model
{
    use HasFactory;

    protected $table = "cart";

    protected $fillable = ["user_id","product_id"];

    public function product():HasMany
    {
        return $this->hasMany(Product::class,"id","product_id");
    }

}
