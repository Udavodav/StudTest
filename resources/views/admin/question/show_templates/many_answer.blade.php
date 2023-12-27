

<div class="form-group mx-3">
    @foreach($question->answers as $answer)
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="checkbox{{$answer->id}}" name="question{{$question->id}}"
                   value="{{$answer->id}}" disabled {{$answer->is_right == 1 ? 'checked' : ''}}>
            <label for="checkbox{{$answer->id}}" class="custom-control-label text-wrap">{{$answer->text}}</label>
        </div>
    @endforeach
</div>

