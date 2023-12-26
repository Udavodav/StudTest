<template id="templ_three">
    <div class="form-group" id="three">
        <div class="justify-content-between">
            <label>Варианты ответа</label>
        </div>
        <div class="form-group">
            <label>Правильный ответ</label>
            <textarea class="form-control" rows="2" maxlength="100" name="empty_answer[answer]"
                      placeholder="Правильный ответ">{{old('empty_answer.answer','') != '' ? old('empty_answer.answer') :
                        (isset($question) && $question->type_id == 3 ? $question->answers->answer : '')}}</textarea>
        </div>
        @error('empty_answer.answer')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</template>
