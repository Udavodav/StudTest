<template id="templ_five">
    <div class="form-group" id="five">
        <div class="justify-content-between">
            <label>Варианты ответа</label>
            <button class="btn btn-warning mx-md-5" type="button"
                    onclick="onClickAddComparison()">Добавить вариант
            </button>
        </div>
        <table class="table table-bordered" id="tableComparison">
            <thead>
            <tr>
                <th>Столбец с неподвижными вариантами</th>
                <th>Столбец с подвижными вариантами</th>
                <th>Кнопки</th>
            </tr>
            </thead>
            <tbody id='tableBody'>
            <div class="form-group">

                @if(isset($question) && $question->type_id == 5 && count($question->answers) == count(old('answers')))
                    @foreach($question->answers as $answer)
                        <tr>
                            <td><textarea class="form-control" name="answers[{{$loop->index}}][option1]" rows="2"
                                          maxlength="500" placeholder="Текст варианта ответа">{{$answer->option1}}</textarea>
                            </td>
                            <td><textarea class="form-control" name="answers[{{$loop->index}}][option2]" rows="2"
                                          maxlength="500" placeholder="Текст варианта ответа">{{$answer->option2}}</textarea>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="onClickDeleteComparisonItem(this)">Удалить</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @for($i = 0; $i < count(old('answers', [0,0])); $i++)
                        <tr>
                            <td><textarea class="form-control" name="answers[{{$i}}][option1]" rows="2"
                                          maxlength="500" placeholder="Текст варианта ответа">{{old('answers.'.$i.'.option1','')}}</textarea>
                            </td>
                            <td><textarea class="form-control" name="answers[{{$i}}][option2]" rows="2"
                                          maxlength="500" placeholder="Текст варианта ответа">{{old('answers.'.$i.'.option2','')}}</textarea>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="onClickDeleteComparisonItem(this)">Удалить</button>
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

        <template id="templ_comparison_item">
            <tr>
                <td><textarea class="form-control" id="option1" name="answers[][option1]" rows="2"
                              maxlength="500" placeholder="Текст варианта ответа"></textarea>
                </td>
                <td><textarea class="form-control" id="option2" name="answers[][option2]" rows="2"
                              maxlength="500" placeholder="Текст варианта ответа"></textarea>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="onClickDeleteComparisonItem(this)">Удалить</button>
                </td>
            </tr>
        </template>
    </div>
</template>
