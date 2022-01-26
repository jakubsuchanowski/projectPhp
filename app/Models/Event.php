<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //relacja 1:1 dla Events i User
    public function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
