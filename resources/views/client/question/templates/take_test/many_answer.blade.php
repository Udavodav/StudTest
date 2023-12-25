

<div class="form-group mx-3">
    @foreach($question->answers->shuffle() as $answer)
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="checkbox{{$answer->id}}" name="questions[{{$question->id}}][answers][][answer_option_id]"
                   value="{{$answer->id}}">
            <label for="checkbox{{$answer->id}}" class="custom-control-label text-wrap">{{$answer->text}}</label>
        </div>
    @endforeach
</div>

