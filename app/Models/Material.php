<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;

    protected $fillable = ['category_id','name','opening_balance'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inwardOutwards()
    {
        return $this->hasMany(InwardOutward::class);
    }
}
