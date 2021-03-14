require('./bootstrap');

$(document).ready(function() {
    // Online Shop, paypal actions
    $(".btn-buy-frack").on("click", function(e) {
        e.preventDefault();
        var type = $(this).data("type");
        if (type === "cup") {
            $("#online-shop select[name='os0']").val("Copa ShadowCO");
        } else if (type === "frack") {
            $("#online-shop select[name='os0']").val("Frack Atributos Lujosos");
        }
        $("#online-shop").submit();
    });
});
