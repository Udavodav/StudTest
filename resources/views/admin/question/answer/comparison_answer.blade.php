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
