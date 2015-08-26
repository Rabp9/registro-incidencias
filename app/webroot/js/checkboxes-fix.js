$(document).ready(function() {
    $(".incidencia-checkbox").each(function() {
        $(this).find("label").before("<span>  </span>");
    });
})