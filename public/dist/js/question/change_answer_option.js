
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
document.getElementById("type_id").onchange = onChange;


window.onload = function () {
    onChange();
}
