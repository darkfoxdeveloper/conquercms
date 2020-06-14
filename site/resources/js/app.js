require('./bootstrap');

$(document).ready(function() {
    var height = document.getElementById("content-container").offsetHeight;
    if (height < screen.height) {
        document.getElementById("footer").classList.add('stikybottom');
    }
});
