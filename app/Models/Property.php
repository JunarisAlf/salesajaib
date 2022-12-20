<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model{
    use HasFactory;
    protected $fillable = ['name', 'baner_filename', 'price', 'status'];

    public function histories(){
        return $this->hasMany(History::class, 'property_id', 'id');
    }
}
