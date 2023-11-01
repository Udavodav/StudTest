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
                <tr id="tr0">
                    <td><textarea class="form-control" name="answers[0][text]" rows="2"
                                  maxlength="500"
                                  placeholder="Text option"></textarea>
                    </td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"
                                   id="checkbox0" value="1" name="answers[0][is_right]">
                            <label for="checkbox0"
                                   class="custom-control-label">Is true?</label>
                        </div>
                    </td>
                </tr>
                <tr id="tr1">
                    <td><textarea class="form-control" name="answers[1][text]" rows="2"
                                  maxlength="500"
                                  placeholder="Text option"></textarea></td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"
                                   id="checkbox1" value="1" name="answers[1][is_right]">
                            <label for="checkbox1"
                                   class="custom-control-label">Is true?</label>
                        </div>
                    </td>
                </tr>
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
