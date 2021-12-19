<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'date',
        'due',
        'total',
        'status'
    ];

    //relationship with user model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
