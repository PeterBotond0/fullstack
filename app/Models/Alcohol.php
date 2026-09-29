<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alcohol extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}