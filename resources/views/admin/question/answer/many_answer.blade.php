<template id="templ_two">
    <div class="form-group" id="two">
        <div class="justify-content-between">
            <label>Answers</label>
            <button class="btn btn-warning mx-md-5" type="button"
                    onclick="onClickAddMany()">Add option
            </button>
            <button class="btn btn-danger mx-md-2" type="button"
                    onclick="onClickDeleteLastOptionMany()">Delete last option
            </button>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Text option</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody id='tableBodyMany'>
            <div class="form-group">

                @if(isset($question) && $question->type_id == 2)
                    @foreach($question->answers as $answer)
                        <tr id="tr{{$loop->index}}">
                            <td><textarea class="form-control" name="answers[{{$loop->index}}][text]" rows="2"
                                          maxlength="500"
                                          placeholder="Text option">{{$answer->text}}</textarea>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox"
                                           id="checkbox{{$loop->index}}" value="1" name="answers[{{$loop->index}}][is_right]"
                                    {{$answer->is_right == 1 ? 'checked' : ''}}>
                                    <label for="checkbox{{$loop->index}}"
                                           class="custom-control-label">Is true?</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @for($i = 0; $i < 2; $i++)
                        <tr id="tr{{$i}}">
                            <td><textarea class="form-control" name="answers[{{$i}}][text]" rows="2"
                                          maxlength="500"
                                          placeholder="Text option"></textarea>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox"
                                           id="checkbox{{$i}}" value="1" name="answers[{{$i}}][is_right]">
                                    <label for="checkbox{{$i}}"
                                           class="custom-control-label">Is true?</label>
                                </div>
                            </td>
                        </tr>
                    @endfor
                @endif

            </div>
            </tbody>
        </table>
        <template id="templ_answer">
            <tr id="tr1">
                <td><textarea class="form-control" name="name" rows="2" maxlength="500"
                              placeholder="Text option"></textarea>
                </td>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"
                               id="checkbox1" value="1" name="answers[][is_right]">
                        <label for="checkbox1" class="custom-control-label">Is true?</label>
                    </div>
                </td>
            </tr>
        </template>
    </div>
</template>
