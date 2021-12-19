<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    //relationship with user model
    public function user(){
        return $this->belongsTo(User::class);
    }
}
