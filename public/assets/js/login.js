$(document).ready(function () {

    $(document).on("submit", ".login", function (e) {
        e.preventDefault();
    //    alert("bem vindo1")
        
        $.ajax({
            url: "Main/Login_submit",
            method: "POST",
            dataType:"json",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
        }).done(function(resp){
            // alert(resp)
            $(".resp").html(resp)
            if(resp === 'logado'){
                setTimeout(function(){location.reload();}, 2000);
            }
             
        });
    });
});
