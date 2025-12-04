let counter = 1;
document.getElementById('radio1').checked = true;

setInterval(function() {
    nextSlide();
}, 5000); // Change de slide toutes les 5 secondes

function nextSlide() {
    counter++;
    if (counter > 3) {
        counter = 1;
    }
    document.getElementById('radio' + counter).checked = true;
}
