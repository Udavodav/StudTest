<template id="templ_one">
    <div class="form-group" id="one">
        <div class="justify-content-between">
            <label>Варианты ответа</label>
            <button class="btn btn-warning mx-md-5" type="button"
                    onclick="onClickAddOnce()">Добавить вариант
            </button>
            <button class="btn btn-danger mx-md-2" type="button"
                    onclick="onClickDeleteLastOptionOnce()">Удалить последний вариант
            </button>
        </div>
        <table class="table table-bordered" id="tableOnce">
            <thead>
            <tr>
                <th>Текст варианта ответа</th>
                <th>Ответ</th>
            </tr>
            </thead>
            <tbody id='tableBodyOnce'>
            <div class="form-group">

                @if(isset($question) && $question->type_id == 1 && count($question->answers) == count(old('answers')))
                    @foreach($question->answers as $answer)
                        <tr id="tr{{$loop->index}}">
                            <td><textarea class="form-control" name="answers[{{$loop->index}}][text]" rows="2"
                                          maxlength="500"
                                          placeholder="Текст варианта ответа">
                                    {{old('answers.'.$loop->index.'.text') != '' ? old('answers.'.$loop->index.'.text') : $answer->text}}
                                </textarea>
                            </td>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio"
                                           id="radio{{$loop->index}}" value="{{$loop->index}}" name="is_right"
                                        {{$answer->is_right == 1 ? 'checked' : ''}}>
                                    <label for="radio{{$loop->index}}"
                                           class="custom-control-label">Правильно?</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @for($i = 0; $i < count(old('answers', [0,0])); $i++)
                        <tr id="tr{{$i}}">
                            <td><textarea class="form-control" name="answers[{{$i}}][text]" rows="2"
                                          maxlength="500"
                                          placeholder="Текст варианта ответа">{{old('answers.'.$i.'.text','')}}</textarea>
                            </td>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio"
                                           id="radio{{$i}}" value="{{$i}}" name="is_right"
                                        {{old('is_right',0) == $i ? 'checked' : ''}}>
                                    <label for="radio{{$i}}"
                                           class="custom-control-label">Правильно?</label>
                                </div>
                            </td>
                        </tr>
                    @endfor
                @endif

            </div>
            </tbody>
        </table>

        @error('answers.*')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <template id="templ_answer">
            <tr >
                <td><textarea class="form-control" name="name" rows="2" maxlength="500"
                              placeholder="Текст варианта ответа"></textarea>
                </td>
                <td>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio"
                               id="radio" value="1" name="is_right">
                        <label for="radio" class="custom-control-label">Правильно?</label>
                    </div>
                </td>
            </tr>
        </template>
    </div>
</template>
