var html_loading = '<div class="text-center padding"><div class="lds-ripple"><div></div><div></div></div></div>';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    loadingPlugins();
});

if ($("#box-grid").length && $("#box-grid").html() == "") {
    $("#box-grid").html(html_loading);
}

$(".btn-novo-registro").on('click', function (e) {
    e.preventDefault();

    var uri = getUri();
    document.location.href = uri + "/registro";
});

$(".btn-listagem").on('click', function (e) {
    e.preventDefault();

    var uri = getUri();
    document.location.href = uri;
});

$(document).on("submit", ".form-grid-pesquisa", function (e) {
    e.preventDefault();

    $.post($(this).attr('action'), $(this).serialize(), function (response) {
        $("#box-grid").html(response);
    }).fail(function (xhr, status, error) {
        alertError(xhr);
    });
});


$(document).on("click", "#box-grid .pagination li  a", function (e) {
    e.preventDefault();

    var page = $(this).html();
    var uri = getUri() + "/listagem";

    var params = $(this).attr('href').split("?");
    if (params[1] != undefined) {
        uri = uri + "?" + params[1];
        if (!Number.isInteger(parseInt(page))) {
            var _page = params[1].split("=");
            page = _page[1];
        }
    }

    loadGRIDPagination(uri, page);
});

formAjax();
