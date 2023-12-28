
let countOnce = 1,
    countMany = 1,
    countOrder = 1,
    countComparison = 1;

function onChange() {
    let b = {
        1: "one",
        2: "two",
        3: "three",
        4: "four",
        5: "five",
    }, c = document.getElementById("type_id").value;

    const answerEl = document.getElementById(b[current]);
    if(answerEl != null)
        answerEl.remove();
    document.getElementById('body_question').append(document.getElementById('templ_' + b[c]).content.cloneNode(true));
    current = c;
}

let current = 1;

const typeEl = document.getElementById("type_id")
if(typeEl != null)
    typeEl.onchange = onChange;
//document.getElementById("type_id").onchange = onChange;


window.onload = function () {
    if(typeEl != null)
        onChange();

    //onChange();
}

function onClickAddOnce(e){
    if(countOnce > 4) return;
    const tbodyEl = document.getElementById('tableBodyOnce');
    countOnce = tbodyEl.childElementCount;

    const item = document.getElementById('templ_answer').content.cloneNode(true);
    item.querySelector('tr').id = `tr${countOnce}`;
    item.querySelector('textarea').name= `answers[${countOnce}][text]`;
    item.querySelector('input').id= `radio${countOnce}`;
    item.querySelector('input').value= `${countOnce}`;
    item.querySelector('label').htmlFor = `radio${countOnce}`;

    tbodyEl.append(item);
}

function onClickDeleteLastOptionOnce(e){
    countOnce = document.getElementById('tableOnce').rows.length - 2;
    if(countOnce < 2) return;
    document.getElementById(`tr${countOnce}`).remove();
}


function onClickAddMany(e){
    if(countMany > 8) return;
    const tbodyEl = document.getElementById('tableBodyMany');
    countMany = tbodyEl.childElementCount;

    const item = document.getElementById('templ_answer').content.cloneNode(true);
    item.querySelector('tr').id = `tr${countMany}`;
    item.querySelector('textarea').name= `answers[${countMany}][text]`;
    item.querySelector('input').id= `checkbox${countMany}`;
    item.querySelector('input').name= `answers[${countMany}][is_right]`;
    item.querySelector('label').htmlFor = `checkbox${countMany}`;

    tbodyEl.append(item);
}

function onClickDeleteLastOptionMany(e){
    countMany = document.getElementById('tableMany').rows.length - 2;
    alert(countMany);
    if(countMany < 2) return;
    document.getElementById(`tr${countMany}`).remove();
}


function onClickAddOrder(e){
    if(countOrder > 7) return;
    const ulEl = document.getElementById('order_list');
    countOrder = ulEl.childElementCount;

    const item = document.getElementById('templ_order_item').content.cloneNode(true);
    ulEl.append(item);
}


function onClickDeleteOrderItem(e){
    countOrder = document.getElementById('order_list').childElementCount;
    alert(countOrder);
    if(countOrder < 4) return;
    e.closest('li').remove();
}


function onClickAddComparison(e){
    if(countComparison > 7) return;
    const tbodyEl = document.getElementById('tableBody');
    countComparison = tbodyEl.childElementCount;

    const item = document.getElementById('templ_comparison_item').content.cloneNode(true);
    item.getElementById('option1').name = `answers[${countComparison}][option1]`;
    item.getElementById('option2').name = `answers[${countComparison}][option2]`;

    tbodyEl.append(item);
}

function onClickDeleteComparisonItem(e) {
    countComparison = document.getElementById('tableComparison').rows.length - 1;
    if(countComparison < 3) return;
    e.closest('tr').remove();
}


