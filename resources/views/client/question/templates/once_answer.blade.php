

<div class="form-group mx-3">
    @foreach($question->answers->shuffle() as $answer)
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="radio{{$answer->id}}" name="questions[{{$question->id}}][answers][][answer_option_id]"
                    value="{{$answer->id}}">
            <label for="radio{{$answer->id}}" class="custom-control-label text-wrap">{{$answer->text}}</label>
        </div>
    @endforeach
</div>

