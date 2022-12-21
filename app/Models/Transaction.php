<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function admin(){
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }
    public function sales(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function property(){
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }
}
