$(document).ready(function() {
    $(".incidencia-checkbox").each(function() {
        var input = $(this).find("label").before("<span>  </span>");
    });
})