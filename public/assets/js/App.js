$(document).ready(function () {
  $('#example').DataTable();



  // console.log("Bem vindo")
  $(".hidden").hide()
  // script para enviar id do usuario e receber os dados

  $(document).on("keyup", ".ids", function (e) {
    e.preventDefault();
    var id = $(this).val();
    $.ajax({
      url: "?action=emprestarBooks",
      method: "POST",
      dataType: "json",
      data: {
        id: id,
      },
      success: function (data) {
        // console.log(data);
        if (data == "") {
          //
          $("#nome").attr("value", "");
          $("#contacto").attr("value", "");
          $("#ano").attr("value", "");
          $("#curso").attr("value", "");
          $("#numero_bi").attr("value", "");
          // alert()
          $(".resposta").html("<code>Usuario Inexistente</code>");
        } else {
          $.each(data, function (key, value) {
            $("#ID_USUARIO").attr("value", data[key].ID);
            $("#nome").attr("value", data[key].nome);
            $("#ano").attr("value", data[key].ano_de_escolaridade);
            $("#contacto").attr("value", data[key].contacto);
            $("#curso").attr("value", data[key].curso);
            $("#numero_bi").attr("value", data[key].NR_BI);
            $(".resposta").html("");
          });
        }
      },
    });
  });
  // script para enviar NOME do usuario e receber os dados

  $(document).on("keyup", ".NOMES", function (e) {
    e.preventDefault();
    // alert("bem vindo")
    var NOME = $(this).val();
    $.ajax({
      url: "?action=DadosUsuario",
      method: "POST",
      dataType: "json",
      data: {
        NOME: NOME,
      },
      success: function (data) {
        // console.log(data);
        if (data == "") {
          //
          $("#nome").attr("value", "");
          $("#contacto").attr("value", "");
          $("#ano").attr("value", "");
          $("#curso").attr("value", "");
          $("#numero_bi").attr("value", "");
          // alert()
          $(".resposta").html("<code>Usuario Inexistente</code>");
        } else {
          $.each(data, function (key, value) {
            $("#ID_USUARIO").attr("value", data[key].ID);
            $("#nome").attr("value", data[key].nome);
            $("#ano").attr("value", data[key].ano_de_escolaridade);
            $("#contacto").attr("value", data[key].contacto);
            $("#curso").attr("value", data[key].curso);
            $("#numero_bi").attr("value", data[key].NR_BI);
            $(".resposta").html("");
          });
        }
      },
    });
  });

  // script para enviar id do livro e receber os dados do livro
  $(document).on("keyup", ".idlivro", function (e) {
    e.preventDefault();
    var idlivro = $(this).val();
    // alert(idlivro)
    $.ajax({
      url: "?action=ReferenciaLivro",
      method: "POST",
      dataType: "json",
      data: {
        idlivro: idlivro,
      },
      success: function (data) {
        if (data == "") {
          //
          $("#titulo").attr("value", "");
          $("#Author").attr("value", "");
          $("#partileira").attr("value", "");

          // alert()
          $(".respostas").html("<code>Livro Inexistente Na lista</code>");
        } else {
          $.each(data, function (key, value) {
            $("#ID_LIVRO").attr("value", data[key].ID_LIVRO);
            $("#titulo").attr("value", data[key].TITULO_LIVRO);
            $("#Author").attr("value", data[key].AUTHOR);
            $("#partileira").attr("value", data[key].PARTILEIRA);
            $(".respostas").html("");
          });
        }
      },
    });
  });



  // script para enviar Nome do Autor do livro e receber os dados do livro
  $(document).on("keyup", ".idlivro", function (e) {
    e.preventDefault();
    var idlivro = $(this).val();
    // alert(idlivro)
    $.ajax({
      url: "?action=ReferenciaLivro",
      method: "POST",
      dataType: "json",
      data: {
        idlivro: idlivro,
      },
      success: function (data) {
        if (data == "") {
          //
          $("#titulo").attr("value", "");
          $("#Author").attr("value", "");
          $("#partileira").attr("value", "");

          // alert()
          $(".respostas").html("<code>Livro Inexistente Na lista</code>");
        } else {
          $.each(data, function (key, value) {
            $("#ID_LIVRO").attr("value", data[key].ID_LIVRO);
            $("#titulo").attr("value", data[key].TITULO_LIVRO);
            $("#Author").attr("value", data[key].AUTHOR);
            $("#partileira").attr("value", data[key].PARTILEIRA);
            $(".respostas").html("");
          });
        }
      },
    });
  });
  /*    // script para enviar id do livro e receber os dados do livro
                                $(document).on("keyup",".idlivro",function(e){
                                e.preventDefault();
                                var TITULO_LIVRO = $(this).val();
                                // alert(id)
                                $.ajax({
                                    url:'LivrosID.php',
                                    method:'POST',
                                    data:{
                                    idlivro:idlivro
                                    } 
                                }).done(function(result){
                                    // alert(result);
                                    $(".resp").html(result);
                                })
                                })
                        */



  // =============================================================================================
  // script para enviar id do livro e receber os dados do livro
   $(document).on("click", ".Emprestimo", function(e) {
    e.preventDefault();
      // alert("bem vindo")
    var ID_LIVRO  = $(this).attr("id");

    var data_devolucao = $('#data_devolucao'+ID_LIVRO+"").val();
    // var ID_LIVRO = $("#ID_LIVRO"+id+" ").val();
    var ID_USUARIO = $("#ID_USUARIO").val();
    // alert(data_devolucao)
    $.ajax({
      url: "?action=CadastrarEmprestimo",
      method: "POST",
      dataType: "json",
      data: {
        data_devolucao: data_devolucao,
        ID_LIVRO: ID_LIVRO,
        ID_USUARIO: ID_USUARIO,
      },
    }).done(function (result) {
      if (result == "Inserido com sucesso!") {
        $("#resp").html("Inserido com sucesso!");
        setTimeout(location.reload(), 200);
      } else {
        alert(result);
      }
        $(".resp").html(result);
    });
  });

 
      
  


  // =============================================================================================

  // devolver livro

  $(document).on("click", ".Devolv", function (e) {
    e.preventDefault();
    var idEmprestimo = $(this).attr("data-value");

    // alert(idEmprestimo)
    $.ajax({
      url: "?action=NomeUsuario",
      method: "POST",
      dataType: "json",
      data: {
        idEmprestimo: idEmprestimo,
      },
      success: function (data) {
        // alert(data.nome);
        // console.log(data.nome)
        $.each(data, function (key, value) {
          // console.log(data[key].nome)
          $("#NomeUser").attr("value", data[key].nome);
        });
      },
    });
  });


  // =============================================================================================

  $("#busca").keyup(function (e) {
    e.preventDefault();
    // alert("bem vindo ao ajax")
    var valor = $(this).val().toLowerCase();

    $(".tab tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
    });
  });


  // =============================================================================================

  $("#buscas").change(function (e) {
    e.preventDefault();
    // alert("bem vindo ao ajax")
    var valor = $(this).val().toLowerCase();

    $(".tab tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
    });
  });


  // =============================================================================================
  $(document).on("change", "#situacao", function (e) {
    e.preventDefault();
    $(".hidden").show("2000");
  })




  // =============================================================================================
  $(document).on("submit", ".Devolucao", function (e) {
    e.preventDefault();
    var idEmprestimo = $("#id").val();
    var ID_LIVRO = $("#idLivro").val();
    var situacao = $("#situacao").val();
    $.ajax({
      url: "?action=RegistarDevolucao",
      method: "POST",
      dataType: "json",
      data: {
        idEmprestimo: idEmprestimo,
        situacao: situacao,
        ID_LIVRO: ID_LIVRO
      },
      success: function (data) {
        // alert(data);
        // console.log(data.nome)
        // $.each(data, function (key, value) {
        // console.log(data)
        // $("#NomeUser").attr("value", data[key]);

        if (data == 'Devolvido com sucesso') {
          $("#response").html("<p class='alert alert-success text-center'>" + data + "</p>");
          location.reload();
        } else if (data == 'Devolvido com sucesso e Pagamento da Multa 100mt') {
          $("#response").html("<p class='alert alert-success text-center'>" + data + "</p>");
          location.reload();
        } else {
          $("#response").html("<p class='alert alert-danger text-center'>" + data + "</p>");
        }

        // });


      },
    });
  });
});
