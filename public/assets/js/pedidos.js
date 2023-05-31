$(document).on("submit", "form", function (e) {
    e.preventDefault();
    if($('input').val() == ''){
        $('input ').addClass('input')
    }
    var url = $(this).attr("action")
    $.ajax({
        url: url,
        method: "POST",
        dataType: "json",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
    }).done(function (resp) {
        if (resp == 'logado com sucesso' || resp == 'Cliente Registado com sucesso' || resp == 'Cliente Registado com sucesso') {
            $(".resp").html('<p class="alert alert-success me-2">'+resp+'</p>')
            setTimeout(function () { location.reload(); }, 2000);
        }else{
            $(".resp").html('<p class="alert alert-danger me-2">'+resp+'</p>')
        }

    });
})

$(document).on("keyup", "input", function (e) {
    $('input ').removeClass('input')
})
