

<div class="form-group mx-3">
    @foreach($question->answers as $answer)
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="checkbox{{$answer->id}}" value="{{$answer->id}}">
            <label for="checkbox{{$answer->id}}" class="custom-control-label">{{$answer->text}}</label>
        </div>
    @endforeach
</div>

