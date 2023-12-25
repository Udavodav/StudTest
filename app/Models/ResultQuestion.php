<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function question(){
        return $this->hasOne(Question::class,'id', 'question_id');
    }

    public function answers(){
        $answers = [];
        switch ($this->question->type_id){
            case 1:case 2:
            $answers = $this->hasMany(ResultAnswerOption::class);
            break;
            case 3:
                $answers = $this->hasOne(ResultAnswerEmpty::class);
                break;
            case 4:case 5:
            $answers = $this->hasMany(ResultAnswerOrder::class);
            break;
        }
        return $answers;
    }
}
