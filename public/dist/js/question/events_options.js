
let countOnce = 1, countMany = 1;

function onClickAddOnce(e){
    if(countOnce > 4) return;
    const tbodyEl = document.getElementById('tableBodyOnce');
    countOnce += 1;

    const item = document.getElementById('templ_answer').content.cloneNode(true);
    item.querySelector('tr').id = `tr${countOnce}`;
    item.querySelector('textarea').name= `answers[${countOnce}][text]`;
    item.querySelector('input').id= `radio${countOnce}`;
    item.querySelector('input').value= `${countOnce}`;
    item.querySelector('label').htmlFor = `radio${countOnce}`;

    tbodyEl.append(item);
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

    const item = document.getElementById('templ_answer').content.cloneNode(true);
    item.querySelector('tr').id = `tr${countMany}`;
    item.querySelector('textarea').name= `answers[${countMany}][text]`;
    item.querySelector('input').id= `checkbox${countMany}`;
    item.querySelector('input').name= `answers[${countMany}][is_right]`;
    item.querySelector('label').htmlFor = `checkbox${countMany}`;

    tbodyEl.append(item);
}

function onClickDeleteLastOptionMany(e){
    if(countMany < 2) return;
    document.getElementById(`tr${countMany}`).remove();
    countMany -= 1;
}
