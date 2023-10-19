
const tableEl = document.getElementById('tableOnce');
let count = 2;

function onClickAddOnce(e){
    if(count > 5) return;
    const tbodyEl = document.getElementById('tableBodyOnce');
    count += 1;

    tbodyEl.innerHTML += `
        <tr id="tr${count}">
            <td><textarea class="form-control" name="textOp[]" rows="2" maxlength="500"
                          placeholder="Text option"></textarea>
            </td>
            <td>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio"
                            id="radio${count}" value="${count}" name="is_right[]">
                    <label for="radio${count}" class="custom-control-label">Correct?</label>
                </div>
            </td>
        </tr>
    `;

}

function onClickDeleteLastOptionOnce(e){
    if(count < 3) return;
    document.getElementById(`tr${count}`).remove();
    count -= 1;
}

function onClickDeleteOnce(e){
    if(!e.target.classList.contains("deleteBtn"))
        return;

    const btn = e.target;
    btn.closest('tr').remove();
}

tableEl.addEventListener("click", onClickDeleteOnce);
