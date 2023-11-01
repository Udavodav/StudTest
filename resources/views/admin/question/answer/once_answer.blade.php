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
                <tr id="tr0">
                    <td><textarea class="form-control" name="answers[0][text]" rows="2"
                                  maxlength="500"
                                  placeholder="Text option"></textarea>
                    </td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio"
                                   id="radio0" value="1" name="is_right" checked>
                            <label for="radio0"
                                   class="custom-control-label">Correct?</label>
                        </div>
                    </td>
                </tr>
                <tr id="tr1">
                    <td><textarea class="form-control" name="answers[1][text]" rows="2"
                                  maxlength="500"
                                  placeholder="Text option"></textarea></td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio"
                                   id="radio1" value="1" name="is_right">
                            <label for="radio1"
                                   class="custom-control-label">Correct?</label>
                        </div>
                    </td>
                </tr>
            </div>
            </tbody>
        </table>
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
