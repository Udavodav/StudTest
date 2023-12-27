

<div class="form-group mx-3">
    @foreach($question->answers as $answer)
        <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="radio{{$answer->id}}" name="question{{$question->id}}" disabled
                    value="{{$answer->id}}" {{$answer->is_right == 1 ? 'checked' : ''}}>
            <label for="radio{{$answer->id}}" class="custom-control-label text-wrap">{{$answer->text}}</label>
        </div>
    @endforeach
</div>

