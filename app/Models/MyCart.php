<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    use HasFactory;
    protected $fillable=['foodID','quantity','userID','dateAdd','orderID'];

    public function Food(){
        return $this->hasMany('App\Models\Food');
    }

    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
