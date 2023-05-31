$(document).ready(function () {
    function displayImg(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#cimg').attr('src', e.target.result);
                _this.siblings('.files').html(input.files[0].name)
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    // Ocultando o bottao ao iniciar a pagina
    $(".buttons").hide();
    // disabilitar alguns inputs do formularios 
    
    $("#apelido").attr("disabled", false);
    $("#email").attr("disabled", false);
    $("#sexo").attr("disabled", false);
    $("#senha").attr("disabled", false);
    $("#ative").attr("disabled", false);

    // ao clicar no botao editar Usuario o botao e os campos inputs serao  habilitados
    $(".editarCliente").click(function () {
        $(".buttons").show("200");
        $("#nome").attr("disabled", false);
        $("#apelido").attr("disabled", false);
        $("#email").attr("disabled", false);
        $("#sexo").attr("disabled", false);
        $("#senha").attr("disabled", false);
        $("#ative").attr("disabled", false);
        $(this).hide("200");
        $(".cliente").html("Actualizar os Dados").show("200");
    })
 
    
    $(document).on("click", ".deletar", function (e) {
        e.preventDefault();
        var Relete = confirm("Tens a certeza que desejas Remover este pedido ?");

    if(Relete == true){
        var url = $(this).attr("data-value")
        var id = $(this).attr("id")
        var Qtty = $(this).attr("data-bs")
        var produtos = $(this).attr("data-id")
     
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: { id: id,produtos:produtos,Qtty:Qtty }
        }).done(function (resp) {
            if (resp == 'Pedido Removido com sucesso' || resp == 'Estado Alterado com sucesso' || resp == 'Pedido Registado com sucesso' ||resp == 'Cliente Registado com sucesso' || resp == 'Categoria Registada com sucesso' || resp == 'Produto Registado com sucesso' ||  resp ==  'Produto Actualizado com sucesso') {
                $(".resp").html('<p class="alert alert-success me-2">' + resp + '</p>')
                setTimeout(function () { location.reload(); }, 2000);
            } else {
                alert(resp)
            }
        })
    }
    })
    $(document).on("change", "#Estado", function (e) {
        e.preventDefault();
        var url = $(this).attr("data-value")
        var id = $(this).attr("data-id")
        var status = $(this).val()
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: { id: id,status:status }
        }).done(function (resp) {
            if (resp == 'Pedido Removido com sucesso'||resp == 'Estado Alterado com sucesso' || resp == 'Pedido Registado com sucesso' ||resp == 'Cliente Registado com sucesso' || resp == 'Categoria Registada com sucesso' || resp == 'Produto Registado com sucesso' ||  resp ==  'Produto Actualizado com sucesso') {
                $(".resp").html('<p class="alert alert-success me-2">' + resp + '</p>')
                setTimeout(function () { location.reload(); }, 2000);
            } else {
                alert(resp)
            }
        })
    })

    // script para ir buscar os dados do cliente solicitado pelo gestor atraves do id do usuario
    $(document).on("change", "#categoria", function (e) {
        e.preventDefault();
        var url = $(this).attr("data-value")
        var id = $(this).val()
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: { id: id }
        }).done(function (resp) {
            // console.log(resp)
            var html = '';
            if(resp == ''){
                html += '<option value="">Nenhum Produto Nessa Categoria</option>';
            }else{
                html = '<option value="">Escolhe o produto</option>';
                for (let index = 0; index < resp.length; index++) {
                    html += '<option value="'+resp[index].id+'">'+resp[index].nome+'</option>';
                }
            }
            
            $('#produtos').html(html)
        })
    })


    // script para ir buscar os dados do cliente solicitado pelo gestor atraves do id do usuario
    $(document).on("click", ".VerCliente", function (e) {
        e.preventDefault(); 
        var url = $(this).attr("data-value")
        var id = $(this).attr("data-id")
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: { id: id }
        }).done(function (resp) {
            $.each(resp, function (key, value) {
                $("#id_cliente").attr("value", resp[key].id_cliente);
                $("#nome").attr("value", resp[key].nome);
                $("#apelido").attr("value", resp[key].apelido);
                $("#email").attr("value", resp[key].email);
                $("#sexo").attr("value", resp[key].sexo);
                $("#senha").attr("value", resp[key].senha);
            });
        })
    })

    // codigo para submisao de formularios e cadastro na base de dados de forma que a pagina nao seja actualizada 
    $(document).on("submit", "form", function (e) {
        e.preventDefault();

        // recebendo o atributo do formulario, o action que sera o caminho usado para chegar ao nosso metodo de cadastro
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
            if ( resp == 'Pedido Registado com sucesso' ||resp == 'Cliente Registado com sucesso' || resp == 'Categoria Registada com sucesso' || resp == 'Produto Registado com sucesso' ||  resp ==  'Produto Actualizado com sucesso') {
                $(".resp").html('<p class="alert alert-success me-2">' + resp + '</p>')
                setTimeout(function () { location.reload(); }, 2000);
            } else {
                $(".resp").html('<p class="alert alert-danger me-2">' + resp + '</p>')
            }
            

        });
    })

    // script para remover o produto 
    $(".RemoveProduto").click(function (e) {
        e.preventDefault();
        var resposta = confirm("Tem a certeza que Deseja Habilitar/Desabilitar a Partileira Temporariamente")
        if (resposta == true) {
            var url = $(this).attr("data-value");
            var id = $(this).attr("data-id");
            var status = $(this).attr("id");
            $.ajax({
                url: url,
                method: "POST",
                dataType: "json",
                data: { id: id, status: status }
            }).done(function (resp) {
                
                if (resp == 'Removido com sucesso') {
                    $(".resp").html('<p class="alert alert-success me-2">' + resp + '</p>')
                    setTimeout(function () { location.reload(); }, 2000);
                } else {
                    alert(resp)
                }
            })
        }
    })

    // script para trazer o dado dos produtos para a sua verificacao e actualizacao
    
    $(document).on("click", ".actionProduts", function (e) {
        e.preventDefault();
        var url = $(this).attr("data-value")
        var id = $(this).attr("data-id")
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: { id: id }
        }).done(function (resp) {
            $.each(resp, function (key, value) {
                $("#id_Produto").attr("value", resp[key].id);
                $("#ProdutoNome").attr("value", resp[key].nome);
                $("#Preco").attr("value", resp[key].preco);
                $("#quantidade").attr("value", resp[key].quantidade);
                // $("#cimg").attr("src", ""+resp[key].sexo);
                $("#descricao").html(resp[key].descricao);
            });
        })

    })


    // script para trazer o dado dos CATEGORIA  para a sua verificacao e actualizacao
    
    $(document).on("click", ".CATEGORIAdADOS", function (e) {
        e.preventDefault();
        var url = $(this).attr("data-value")
        var id = $(this).attr("data-id")
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: { id: id }
        }).done(function (resp) {
            $.each(resp, function (key, value) {
                $("#id_categoria").attr("value", resp[key].id);
                $("#Nomecategoria").attr("value", resp[key].nomeCategoria);
                $("#Descricao").html(resp[key].descricao);
            });
        })
    })


    // $(".EditarProduto").hide();
    // disabilitar alguns inputs do formularios 
    $("#nome").attr("disabled", true);
    $("#apelido").attr("disabled", true);
    $("#email").attr("disabled", true);
    $("#sexo").attr("disabled", true);
    $("#senha").attr("disabled", true);
    $("#ative").attr("disabled", true);

    // ao clicar no botao editar Usuario o botao e os campos inputs serao  habilitados
    $(".ShowEditar").click(function () {
        // $(".EditarProduto").show("200");
        $("#nome").attr("disabled", false);
        $("#apelido").attr("disabled", false);
        $("#email").attr("disabled", false);
        $("#sexo").attr("disabled", false);
        $("#senha").attr("disabled", false);
        $("#ative").attr("disabled", false);
        $(this).hide("200");
        $(".cliente").html("Actualizar os Dados").show("200");
    })
})
