<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invite(){
        return $this->belongsTo(InviteTest::class);
    }

    public function questions(){
        return $this->hasMany(ResultQuestion::class);
    }

}
