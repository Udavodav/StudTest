

<div class="form-group mx-3">
    @foreach($resQuestion->question->answers as $answer)
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="radio{{$answer->id}}" name="question{{$resQuestion->question_id}}" disabled
                    value="{{$answer->id}}" {{($resQuestion->answers->count() != 0 && $resQuestion->answers->first()->answer_option_id == $answer->id) ? 'checked' : ''}}>
            <label for="radio{{$answer->id}}" class="custom-control-label text-wrap">{{$answer->text}}</label>
        </div>
    @endforeach
</div>

