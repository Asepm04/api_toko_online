<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;
use App\Http\Models\CartModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Product2';
    public $timestamps = false;

    protected $fillable = [
        "user_id",
        "name_product",
        "kategori",
        "image",
        "price",
        "stock"
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,"user_id","id");
    }

    public function cart():BelongsTo
    {
        return $this->belongsTo(CartModel::class,"id","product_id");
    }
}
