const box = document.getElementById('group_div');

function handleRadioClick() {
    if (document.getElementById('radioClient').checked) {
        box.style.visibility = 'visible';
    } else {
        box.style.visibility = 'hidden';
    }
}

const radioButtons = document.querySelectorAll('input[name="is_admin"]');
radioButtons.forEach(radio => {
    radio.addEventListener('click', handleRadioClick);
});
