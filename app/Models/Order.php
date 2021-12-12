<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product',
        'price',
        'details',
        'user_id',
        'created_at',
        'updated_at'
    ];

    public function users(){
       return  $this->belongsTo(User::class,'user_id','id');

    }
}
