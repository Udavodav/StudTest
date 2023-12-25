<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerOption extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function isTrue(){
        return (bool) $this->is_right;
    }
}
