<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'price',
        'alcohol_id'
    ];

    public function alcohol()
    {
        return $this->belongsTo(Alcohol::class);
    }
}