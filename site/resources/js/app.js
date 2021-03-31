require('./bootstrap');
require('datatables.net-bs4');

$(document).ready(function() {
    // Get current language
    var lang = $("body").data("current-lang");
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
