<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function answers(){
        $answers = [];
        switch ($this->type_id){
            case 1:case 2:
                $answers = $this->hasMany(AnswerOption::class);
                break;
            case 3:
                $answers = $this->hasOne(AnswerEmpty::class);
                break;
            case 4:case 5:
                $answers = $this->hasMany(AnswerOrder::class);
                break;
        }
        return $answers;
    }

    public function test(){
        return $this->belongsTo(Test::class);
    }

    public function answersOption(){
        return $this->hasMany(AnswerOption::class);
    }

    public function answersOrder(){
        return $this->hasMany(AnswerOrder::class);
    }

}


