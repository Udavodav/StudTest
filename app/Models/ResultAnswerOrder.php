<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultAnswerOrder extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function answerOption1(){
        return $this->hasOne(AnswerOrder::class, 'id', 'result_answer_order_option1_id');
    }

    public function answerOption2(){
        return $this->hasOne(AnswerOrder::class, 'id', 'result_answer_order_option2_id');
    }
}
