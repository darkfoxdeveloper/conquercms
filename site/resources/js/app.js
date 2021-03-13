require('./bootstrap');

$(document).ready(function() {
    var height = document.getElementById("content-container").offsetHeight;
    if (height < screen.height) {
        if (document.getElementById("footer") != null) {
            document.getElementById("footer").classList.add('stikybottom');
        }
    }

    // Online Shop, paypal actions
    $(".btn-buy-frack").on("click", function(e) {
        e.preventDefault();
        $("#online-shop select[name='os0']").val("Frack Atributos Lujosos");
        $("#online-shop").submit();
    });
});
