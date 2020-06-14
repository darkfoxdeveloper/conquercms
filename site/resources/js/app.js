require('./bootstrap');

$(document).ready(function() {
    var height = document.getElementById("content-container").offsetHeight;
    if (height < screen.height) {
        if (document.getElementById("footer") != null) {
            document.getElementById("footer").classList.add('stikybottom');
        }
    }
});
