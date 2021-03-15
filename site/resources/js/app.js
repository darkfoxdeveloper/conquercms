require('./bootstrap');
require('datatables.net-bs4');

$(document).ready(function() {
    // Get current language
    var lang = $("body").data("current-lang");
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
    // datatables init
    var langFile = "English.json";
    if (lang === "es") {
        langFile = "Spanish.json";
    }
    $('.datatable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/" + langFile
        }
    });
});
