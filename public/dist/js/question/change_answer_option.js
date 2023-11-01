
// document.getElementById("type_id")
//     .onchange = function () {
//     var b = {
//             1: "one",
//             2: "two",
//             3: "three",
//             4: "thor",
//             5: "five",
//         }, c = this.value,
//         a;
//     for (a in b) document.getElementById(b[a])
//         .style.display = 0 === c || c === a ? "block" : "none"
// };

let current = 1;
document.getElementById("type_id")
    .onchange = function () {
    var b = {
            1: "one",
            2: "two",
            3: "three",
            4: "thor",
            5: "five",
        }, c = this.value;
    //document.getElementById('item_box').remove();
    //document.getElementById('body_question').innerHTML += `@include('admin.question.answer.once_answer')`;
    switch (c) {
        case 1:
            document.getElementById('body_question').innerHTML = `@include('admin.question.answer.once_answer')`;
            break;
        case 2:
            document.getElementById('body_question').innerHTML = `@include('admin.question.answer.many_answer')`;
            break;
        default:
            alert( "Нет таких значений(" + c  + ")");
    }
    current = c;
};
