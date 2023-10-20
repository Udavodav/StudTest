
let countOnce = 1, countMany = 1;

function onClickAddOnce(e){
    if(countOnce > 4) return;
    const tbodyEl = document.getElementById('tableBodyOnce');
    countOnce += 1;

    // tbodyEl.innerHTML += `
    //     <tr id="tr${countOnce}">
    //         <td><textarea class="form-control" name="textOnce[]" rows="2" maxlength="500"
    //                       placeholder="Text option"></textarea>
    //         </td>
    //         <td>
    //             <div class="custom-control custom-radio">
    //                 <input class="custom-control-input" type="radio"
    //                         id="radio${countOnce}" value="${countOnce}" name="is_rightOnce[]">
    //                 <label for="radio${countOnce}" class="custom-control-label">Correct?</label>
    //             </div>
    //         </td>
    //     </tr>
    // `;
    tbodyEl.innerHTML += `
        <tr id="tr${countOnce}">
            <td><textarea class="form-control" name="answersOnce[${countOnce}][text]" rows="2" maxlength="500"
                          placeholder="Text option"></textarea>
            </td>
            <td>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio"
                            id="radio${countOnce}" value="${countOnce}" name="is_rightOnce[]">
                    <label for="radio${countOnce}" class="custom-control-label">Correct?</label>
                </div>
            </td>
        </tr>
    `;
}

function onClickDeleteLastOptionOnce(e){
    if(countOnce < 2) return;
    document.getElementById(`tr${countOnce}`).remove();
    countOnce -= 1;
}


function onClickAddMany(e){
    if(countMany > 8) return;
    const tbodyEl = document.getElementById('tableBodyMany');
    countMany += 1;

    // tbodyEl.innerHTML += `
    //     <tr id="tr${countMany}">
    //         <td><textarea class="form-control" name="textOnce[]" rows="2" maxlength="500"
    //                       placeholder="Text option"></textarea>
    //         </td>
    //         <td>
    //             <div class="custom-control custom-radio">
    //                 <input class="custom-control-input" type="radio"
    //                         id="radio${countMany}" value="${countMany}" name="is_rightOnce[]">
    //                 <label for="radio${countMany}" class="custom-control-label">Correct?</label>
    //             </div>
    //         </td>
    //     </tr>
    // `;
    tbodyEl.innerHTML += `
        <tr id="tr${countMany}">
            <td><textarea class="form-control" name="answersMany[${countMany}][text]" rows="2" maxlength="500"
                          placeholder="Text option"></textarea>
            </td>
            <td>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox"
                            id="checkbox${countMany}" value="${countMany}" name="is_rightMany[]">
                    <label for="checkbox${countMany}" class="custom-control-label">Is true?</label>
                </div>
            </td>
        </tr>
    `;

}

function onClickDeleteLastOptionMany(e){
    if(countMany < 2) return;
    document.getElementById(`tr${countMany}`).remove();
    countMany -= 1;
}
