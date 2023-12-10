

<div class="form-group mx-3">
    @foreach($question->answers as $answer)
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="radio{{$answer->id}}" name="radio{{$question->id}}"
                    value="{{$answer->id}}">
            <label for="radio{{$answer->id}}" class="custom-control-label">{{$answer->text}}</label>
        </div>
    @endforeach
</div>

