function getUri() {
    var path = window.location.pathname.split('/');
    return "/" + path[1] + "/" + path[2];
}

function loadingDataGrid() {
    loadGRID(getUri() + "/listagem", 1);
}

function alertError(xhr) {
    alert(xhr);
}

function loadGRID(url, page) {
    $("#box-grid").html(html_loading);

    $.post(url, {page: page, _token: token}, function (response) {
        $("#box-grid").html(response);
    }).fail(function (xhr, status, error) {
        alertError(xhr);
    });
}

function mask() {
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $('.money2').mask("#.##0,00", {reverse: true});
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
            'Z': {
                pattern: /[0-9]/, optional: true
            }
        }
    });
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {reverse: true});
    $('.clear-if-' +
        '' +
        '-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
}

function loadingPlugins() {
    $(".chosen").chosen({no_results_text: "Ops, nada foi encontrado!"});

    mask();
}

function formAjax() {
    $(document).ready(function () {
        clearErrorInputs();

        var options = {
            type: 'post',
            beforeSubmit: function (xhr, status, error) {
                clearErrorInputs();
                $('input[type="submit"]').attr("disabled", true);
            },
            error: function (xhr, status, error) {
                $('input[type="submit"]').attr("disabled", false);
                setError(xhr);
            },
            success: function (response, status, error) {
                $('input[type="submit"]').attr("disabled", false);

                if (status == 'success') {
                    if (response.url) {
                        if (response.url == 'function') {
                            // reloadFunctionPage();
                        } else {
                            window.location.href = response.url;
                        }
                    } else {
                        window.location.href = getUri();
                    }
                } else {
                    alert('ERRO não esperado!');
                }

                return true;
            }
        };

        return $(".frm-ajax").ajaxForm(options);
    });
}

function setError(xhr) {
    if (xhr.status == 422) {
        var _errors = $.parseJSON(xhr.responseText);
        setErrorInputs(_errors.errors);
    }

    if (xhr.status == 500) {
        var _errors = $.parseJSON(xhr.responseText);
        alert(_errors.message);
    }
}

function setErrorInputs(errors) {
    clearErrorInputs();

    $.each(errors, function (key, value) {
        $.each(['input', 'textarea', 'select'], function (_key, field) {
            var obj = $("form " + field + "[name='" + key + "']").parent();

            if (obj.length == 0) {
                obj = $("form " + field + "[name='" + key + "[]']").parent();
            }

            if (obj.length) {
                obj.addClass('has-error');
                obj.append("<div class='invalid-feedback form-input-error'>" + value + "</div>");
            }
        });
    });

    if ($("div.box-error-message").length > 0) {
        var box_errors = $("div.box-error-message");
        var _errors = "";
        $.each(errors, function (key, error) {
            _errors += error + '<br />';
        });

        box_errors.html('<div class="alert alert-danger">' + _errors + '</div>');
    }

}

function clearErrorInputs() {
    $("form input").parent().removeClass('has-error');
    $("form textarea").parent().removeClass('has-error');
    $("form select").parent().removeClass('has-error');

    $(".form-input-error").remove();
    $("div.box-error-message").html("");
}

function clearSelectOption(select) {
    $select = $("." + select);
    $select.find('option').remove();

    $('<option>').val('').text('...').appendTo($select);
    $('.chosen').trigger('chosen:updated');

    return $select;
}

function populateSelectOption(select, response) {
    $select = clearSelectOption(select);

    $.each(response, function (key, value) {
        $('<option>').val(key).text(value).appendTo($select);
    });

    $('.chosen').trigger('chosen:updated');
}

function hashLink() {
    var hash = window.location.hash;
    if (hash.length) {
        $("ul " + hash + "-tab").trigger('click');
    }
}

function loadGRIDPagination(uri, _page) {

    if ($("#box-grid").length) {
        $("#box-grid").html(html_loading);

        var url = uri.split("?");

        var _params = new Array();
        var i = 0;
        if (url[1] != undefined) {
            $(url[1].split("&")).each(function (i, text) {
                var params = text.split("=");

                _params[params[0]] = params[1];
            });
            _params["page"] = _page;
        } else {
            _params["page"] = _page;
        }

        _params["_token"] = token;

        $.post(url[0].replace("/grid/", "/grid"),
            convArrToObj(_params)
            , function (data) {
                $("#box-grid").html(data);
            });
    }

}

function convArrToObj(array) {
    var thisEleObj = new Object();
    if (typeof array == "object") {
        for (var i in array) {
            var thisEle = convArrToObj(array[i]);
            thisEleObj[i] = thisEle;
        }
    } else {
        thisEleObj = array;
    }

    return thisEleObj;
}

function notyError(message) {
    Swal.fire({
        text: message,
        type: 'error',
        confirmButtonText: 'Fechar'
    })
}
