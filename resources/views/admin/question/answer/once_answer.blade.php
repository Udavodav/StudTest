<template id="templ_one">
    <div class="form-group" id="one">
        <div class="justify-content-between">
            <label>Answers</label>
            <button class="btn btn-warning mx-md-5" type="button"
                    onclick="onClickAddOnce()">Add option
            </button>
            <button class="btn btn-danger mx-md-2" type="button"
                    onclick="onClickDeleteLastOptionOnce()">Delete last option
            </button>
        </div>
        <table class="table table-bordered" id="tableOnce">
            <thead>
            <tr>
                <th>Text option</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody id='tableBodyOnce'>
            <div class="form-group">

                @if(isset($question) && $question->type_id == 1 && count($question->answers) == count(old('answers')))
                    @foreach($question->answers as $answer)
                        <tr id="tr{{$loop->index}}">
                            <td><textarea class="form-control" name="answers[{{$loop->index}}][text]" rows="2"
                                          maxlength="500"
                                          placeholder="Text option">
                                    {{old('answers.'.$loop->index.'.text') != '' ? old('answers.'.$loop->index.'.text') : $answer->text}}
                                </textarea>
                            </td>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio"
                                           id="radio{{$loop->index}}" value="1" name="is_right"
                                        {{$answer->is_right == 1 ? 'checked' : ''}}>
                                    <label for="radio{{$loop->index}}"
                                           class="custom-control-label">Correct?</label>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @for($i = 0; $i < count(old('answers', [0, 0])); $i++)
                        <tr id="tr{{$i}}">
                            <td><textarea class="form-control" name="answers[{{$i}}][text]" rows="2"
                                          maxlength="500"
                                          placeholder="Text option">{{old('answers.'.$i.'.text')}}</textarea>
                            </td>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio"
                                           id="radio{{$i}}" value="1" name="is_right"
                                        {{old('is_right') == $i ? 'checked' : ''}}>
                                    <label for="radio{{$i}}"
                                           class="custom-control-label">Correct?</label>
                                </div>
                            </td>
                        </tr>
                    @endfor
                @endif

            </div>
            </tbody>
        </table>

        @error('answers.*.text')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <template id="templ_answer">
            <tr >
                <td><textarea class="form-control" name="name" rows="2" maxlength="500"
                              placeholder="Text option"></textarea>
                </td>
                <td>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio"
                               id="radio" value="1" name="is_right">
                        <label for="radio" class="custom-control-label">Correct?</label>
                    </div>
                </td>
            </tr>
        </template>
    </div>
</template>
