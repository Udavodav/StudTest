<template id="templ_five">
    <div class="form-group" id="five">
        <div class="justify-content-between">
            <label>Answers</label>
            <button class="btn btn-warning mx-md-5" type="button"
                    onclick="onClickAddComparison()">Add option
            </button>
        </div>
        <table class="table table-bordered" id="table">
            <thead>
            <tr>
                <th>Column of options static</th>
                <th>Column of options dynamic</th>
                <th>Button</th>
            </tr>
            </thead>
            <tbody id='tableBody'>
            <div class="form-group">

                @if(isset($question) && $question->type_id == 5)
                    @foreach($question->answers as $answer)
                        <tr>
                            <td><textarea class="form-control" name="answers[{{$loop->index}}][option1]" rows="2"
                                          maxlength="500" placeholder="Text option">{{$answer->option1}}</textarea>
                            </td>
                            <td><textarea class="form-control" name="answers[{{$loop->index}}][option2]" rows="2"
                                          maxlength="500" placeholder="Text option">{{$answer->option2}}</textarea>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="onClickDeleteComparisonItem(this)">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @for($i = 0; $i < 2; $i++)
                        <tr>
                            <td><textarea class="form-control" name="answers[{{$i}}][option1]" rows="2"
                                          maxlength="500" placeholder="Text option"></textarea>
                            </td>
                            <td><textarea class="form-control" name="answers[{{$i}}][option2]" rows="2"
                                          maxlength="500" placeholder="Text option"></textarea>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="onClickDeleteComparisonItem(this)">Delete</button>
                            </td>
                        </tr>
                    @endfor
                @endif


            </div>
            </tbody>
        </table>
        <template id="templ_comparison_item">
            <tr>
                <td><textarea class="form-control" id="option1" name="answers[][option1]" rows="2"
                              maxlength="500" placeholder="Text option"></textarea>
                </td>
                <td><textarea class="form-control" id="option2" name="answers[][option2]" rows="2"
                              maxlength="500" placeholder="Text option"></textarea>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="onClickDeleteComparisonItem(this)">Delete</button>
                </td>
            </tr>
        </template>
    </div>
</template>
