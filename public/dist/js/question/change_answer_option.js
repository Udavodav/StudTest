
document.getElementById("type_id")
    .onchange = function () {
    var b = {
            1: "one",
            2: "two",
            3: "three",
            4: "thor",
            5: "five",
        }, c = this.value,
        a;
    for (a in b) document.getElementById(b[a])
        .style.display = 0 === c || c === a ? "block" : "none"
};
