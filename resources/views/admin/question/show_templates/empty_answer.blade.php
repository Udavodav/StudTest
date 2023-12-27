
<div class="form-group mx-3">
    <div class="custom-control custom-radio">
        <label for="empty_answer">Ответ: </label>
        <input class="form-control" type="text" id="empty_answer" name="question{{$question->id}}" disabled
        value="{{$question->answers->answer}}">
    </div>
</div>

