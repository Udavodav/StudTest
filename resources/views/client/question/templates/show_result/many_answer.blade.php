

<div class="form-group mx-3">
    @foreach($resQuestion->question->answers as $answer)
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="checkbox{{$answer->id}}" name="question{{$resQuestion->question_id}}"
                   value="{{$answer->id}}" disabled {{($resQuestion->answers->count() != 0 && $resQuestion->answers->firstWhere('answer_option_id', $answer->id)) ? 'checked' : ''}}>
            <label for="checkbox{{$answer->id}}" class="custom-control-label text-wrap">{{$answer->text}}</label>
        </div>
    @endforeach
</div>

