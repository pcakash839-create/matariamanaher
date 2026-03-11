<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InwardOutward extends Model
{
    protected $fillable = ['material_id', 'date', 'quantity'];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
