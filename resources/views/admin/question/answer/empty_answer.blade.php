<template id="templ_three">
    <div class="form-group" id="three">
        <div class="justify-content-between">
            <label>Answers</label>
        </div>
        <div class="form-group">
            <label>Right answer</label>
            <textarea class="form-control" rows="2" maxlength="100" name="empty_answer[answer]"
                      placeholder="Right answer">{{isset($question) && $question->type_id == 3 ? $question->answers->answer : ''}}</textarea>
        </div>
    </div>
</template>
