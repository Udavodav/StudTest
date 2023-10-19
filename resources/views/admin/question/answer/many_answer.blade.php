
<div class="form-group" id="two" style="display:none">
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
            <tr id="tr1">
                <td><textarea class="form-control" name="textOp[]" rows="2"
                              maxlength="500"
                              placeholder="Text option"></textarea>
                </td>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"
                               id="checkbox1" value="1" name="is_right[]">
                        <label for="checkbox1"
                               class="custom-control-label">Is true?</label>
                    </div>
                </td>
            </tr>
            <tr id="tr2">
                <td><textarea class="form-control" name="textOp[]" rows="2"
                              maxlength="500"
                              placeholder="Text option"></textarea></td>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"
                               id="checkbox2" value="2" name="is_right[]">
                        <label for="checkbox2"
                               class="custom-control-label">Is true?</label>
                    </div>
                </td>
            </tr>
        </div>
        </tbody>
    </table>
</div>
