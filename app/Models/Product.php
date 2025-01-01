<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Product2';
    public $timestamps = false;

    protected $fillable = [];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
