
<div class="form-group mx-3">
    <div class="custom-control custom-radio">
        <label for="empty_answer">Ответ: </label>
        <input class="form-control" type="text" id="empty_answer" name="question{{$resQuestion->question_id}}" disabled
        value="{{$resQuestion->answers->text}}">
    </div>
</div>

