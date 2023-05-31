<?php

namespace core\controllers;

use core\classes\Store;
use core\models\library;
use Mpdf\Http\Request;
    
class Main
{

     //========================================================================================================
     // index de acesso a pagina de login para autenticacao do cliente
     public function index()
     {
          if(isset($_SESSION['Admin'])){
               Store::redirect('Admin');
               return;
           }else if(isset($_SESSION['cliente'])){
               Store::redirect('Cliente');
               return;
           }

          //  echo $_SESSION['Admin'];
          Store::Layout([
               'login/layout/header_html',
               'login/index',
               'login/layout/footer',
          ]);
     }
     //========================================================================================================
     // metodo para acessar a pagina registar
     public function registar()
     {

          Store::Layout([
               'login/layout/header_html',
               'login/registar',
               'login/layout/footer',
          ]);
     }
     //========================================================================================================
     // metodo para o Registar do cliente a base de dados
     public function RegistarCliente()
     {
          $saida = '';
          $library = new library();
          //    variaveis para o cadastro do cliente 
          $nome = filter_input(INPUT_POST, 'nome');
          $apelido = filter_input(INPUT_POST, 'apelido');
          $email = filter_input(INPUT_POST, 'email');
          $sexo = filter_input(INPUT_POST, 'sexo');
          $senha = filter_input(INPUT_POST, 'senha');
          $Confsenha = filter_input(INPUT_POST, 'confirSenha');

          //    validacao dos campos 
          if (empty($nome)) {
               $saida = 'Preencha o campo nome';
          } else if (empty($apelido)) {
               $saida = 'Preencha o campo Apelido';
          } else if (empty($email)) {
               $saida = 'Preencha o campo email';
          } else if (empty($sexo)) {
               $saida = 'EScolha o campo  sexo';
          } else if (empty($senha)) {
               $saida = 'Preencha o campo senha';
          } else if ($senha != $Confsenha) {
               $saida = 'Campo senha e confirmar senha são';
          } else {
               $library->CadastrarCliente($nome, $apelido, $email, $sexo, $senha);
               $saida = 'Cliente Registado com sucesso';
          }
          //    saida da mensagem para a visualizacao do cliente 
          echo json_encode($saida);
     }
     //=========================================================================================================    
     // metodo para o Registar do cliente a base de dados
     public function DadosCliente()
     {
          $saida = '';
          $library = new library();
          // variavel para buscar os dados de um cliente especifico
          $id = filter_input(INPUT_POST, 'id');
          if (empty($id)) {
               $saida = 'Preencha o campo nome';
          } else {
               $saida  = $library->DadosCliente($id);
          }
          echo json_encode($saida);
     }

     public function ActualizarCliente()
     {
          $saida = '';
          $library = new library();
          //    variaveis para o cadastro do cliente 
          $id = filter_input(INPUT_POST, 'id');
          $nome = filter_input(INPUT_POST, 'nome');
          $apelido = filter_input(INPUT_POST, 'apelido');
          $email = filter_input(INPUT_POST, 'email');
          $sexo = filter_input(INPUT_POST, 'sexo');
          $status = filter_input(INPUT_POST, 'status');

          //    validacao dos campos 
          if (empty($nome)) {
               $saida = 'Preencha o campo nome';
          } else if (empty($apelido)) {
               $saida = 'Preencha o campo Apelido';
          } else if (empty($email)) {
               $saida = 'Preencha o campo email';
          } else if (empty($sexo)) {
               $saida = 'Escolha o campo  sexo';
          } else {
               $library->ActualizarCliente($id, $nome, $apelido, $email, $sexo, $status);
               $saida = 'Cliente Registado com sucesso';
          }

          //    saida da mensagem para a visualizacao do cliente 
          echo json_encode($saida);
     }

     public function RegistarPedido()
     {
          $saida = '';
          $nome = filter_input(INPUT_POST, 'cliente');
          $produto = filter_input(INPUT_POST, 'produtos');
          $quantidade = filter_input(INPUT_POST, 'quantidade');
          $status = filter_input(INPUT_POST, 'status');


          $library = new library();
          
          /* pegar a quantidade do produto na tabela produto e subtrair pela
            quantidade escolhida pelo cliente e inserir na tabela produtos o remanescente */
          $result = $library->VerificarQuantidade($produto);
     
          

          
          // if(!empty($nome) &&  !empty($produto)){
               // Verificar se o pedido existe na tabela pedidos
               $results = $library->VerificarProdutoPedido($produto,$nome);
          // }

          if (empty($nome)) {
               $saida = 'Escolha o Cliente do Pedido';
          } else if (empty($produto)) {
               $saida = 'Escolha o Produto';
          } else if (empty($quantidade)) {
               $saida = 'Informe a quantidade do Produto';
          } else if ($result[0]->quantidade < $quantidade) {
               $saida = 'Produto Nao Tem Stock';
          } else if(count($results) > 0){
               // Pegar a quantidade do pedido existente na tabela pedidos e adicionar com a nova quantidade e actualizar na tabela pedidos
               $QttNova = $results[0]->quantidade + $quantidade;
               $library->ActualizarQuantidadePedido( $nome, $produto,$QttNova);
               $saida = 'Pedido Registado com sucesso';
               $Qtty = $result[0]->quantidade - $quantidade;
               $library->NovaQuantidade($Qtty, $produto);
          }else {
               // Registar no novo pedido do usuario caso nao haja nenhum pedido com a mesmas caracteristicas
               $library->RegistarPedido($nome, $produto, $quantidade, $status);
               $saida = 'Pedido Registado com sucesso';
               $Qtty = $result[0]->quantidade - $quantidade;
               $library->NovaQuantidade($Qtty, $produto);
             
          }

          echo json_encode($saida);
     }

     public function AtualizarPedido()
     {
          $saida = '';
          $id = filter_input(INPUT_POST, 'id');
          $nome = filter_input(INPUT_POST, 'cliente');
          $produto = filter_input(INPUT_POST, 'produtos');
          $quantidade = filter_input(INPUT_POST, 'quantidade');
          $status = filter_input(INPUT_POST, 'status');


          $library = new library();
          // Verificar a quantidade existente no stocke do determinado produto
          $result = $library->VerificarQuantidade($produto);
          // Buscar a quantidade do pedido do presente cliente 
          $PedidosQtty = $library->VerificarQuantidadePedido($id);
          // Buscar o status do pedido do seguinte cliente
          $Estado = $library->VerificarStatus($id);

          if (empty($nome)) {
               $saida = 'Escolha o Cliente do Pedido';
          } else if (empty($produto)) {
               $saida = 'Escolha o Produto';
          } else if (empty($quantidade)) {
               $saida = 'Informe a quantidade do Produto';
          } else if ($result[0]->quantidade < 6) {
               $saida = 'Produto Nao Tem Stock';
          } else {


               /* verificar o status do pedido: 
                    -se o pedido esta com o status pago ele entra no if e faz a sua subtracao na tabela produto 
                    -se o pedido esta com status em aberto o pedido fica pendente ate o seu devido pagamento para o efeito de saida ou subtracao da tabela produto e entrega ao cliente
               */
               // if($Estado[0]->status == 'Pago'){
               /* 
                         Neste caso se a quantidade fornecida pelo usuario for superior a quantidade existente na tabela do pedido do cliente: sera feito o seguinte 
                         1 - achar a quantidade adicionada 
                         2 - subtrair na tabela produtos para efeitos de saida de produto 
                         3 - Adicionar a quantidade adicionada a quantidade existente do cliente

                         NB: temos que ter em conta que o pedido esta como pago por isso a necessidade de se fazer as seguintes tarefas acima para nao se subtrair duas vezes a quantidade que ja tinha sido subtraida
                    */

               if ($PedidosQtty[0]->quantidade < $quantidade) {
                    // Os passo que estao sendo seguidos estao acima
                    // 1 - Passo: 
                    $Qtty = $quantidade - $PedidosQtty[0]->quantidade;
                    // 2- Passo :
                    $Qtty1 = $result[0]->quantidade - $Qtty;
                    $library->NovaQuantidade($Qtty1, $produto);
                    // 3-Passo :
                    $QttNova = $Qtty + $PedidosQtty[0]->quantidade;
                    $library->ActualizarPedido($id, $nome, $produto, $QttNova);
                    $saida = 'Pedido Registado com sucesso';
               } else {
                    // Os passo que estao sendo seguidos estao acima
                    // 1 - Passo: 
                    // 2- Passo :
                    $Qtty = $result[0]->quantidade + $PedidosQtty[0]->quantidade;
                    $Qtty1 = $Qtty - $quantidade;
                    $library->NovaQuantidade($Qtty1, $produto);
                    // 3-Passo :
                    $QttNova = $quantidade;
                    $library->ActualizarPedido($id, $nome, $produto, $QttNova);
                    $saida = 'Pedido Registado com sucesso';
               }
               // }else if($Estado[0]->status ==  'Em Aberto'){
               //           $QttNova =  $quantidade;
               //           $library->ActualizarPedido($id,$nome,$produto,$QttNova);
               //           $saida = 'Pedido Registado com sucesso';
               // }else{
               //      $saida = 'Quantidade Não foi Alterada';
               // }
          }

          echo json_encode($saida);
     }

     // Actualizar o status do pedido do cliente 
     public function EstadoPedido()
     {
          $saida = '';
          $status = filter_input(INPUT_POST, 'status');
          $id = filter_input(INPUT_POST, 'id');
          $library = new library();
          if (empty($status)) {
               $saida = 'Escolha o Cliente do Pedido';
          } else {
               $library->EstadoPedidos($id, $status);
               $saida = 'Estado Alterado com sucesso';
          }
          echo json_encode($saida);
     }
     // Buscar a lista de produtos e visualizar no select para casos de escolha da categoria 
     public function ProdutoEspecidico(){
          $saida = '';
          $response = '';
          $library = new library();
          $id =$_POST['id'];
          $dados = $library->ProdutoBusca($id);
          echo json_encode($dados);
      }
     //  Deletar Pedidos 
     public function DeletarPedido() 
     {
          $saida = '';
          $produto = filter_input(INPUT_POST, 'produtos');
          $quantidade = filter_input(INPUT_POST, 'Qtty');
          $id = filter_input(INPUT_POST, 'id');
          $library = new library();
          // Verificar a quantidade existente no stocke do determinado produto
          $result = $library->VerificarQuantidade($produto);
          $Estado = $library->VerificarStatus($id);

          if (empty($id)) {
               $saida = 'Nenhum Pedido Selecionado';
          } else {
               
               $Qtty1 = $result[0]->quantidade + $quantidade;
               $library->NovaQuantidade($Qtty1,$produto);
               $library->RemoverPedido($id);
               $saida = 'Pedido Removido com sucesso';
          }
          echo json_encode($saida);
     }
     public function LoginSistem(){
          $saida = '';
        $error = array();
        $email = filter_input(INPUT_POST,'email');
        $senha = filter_input(INPUT_POST,'senha');

        if(empty($email)){
            $error['e'] = 'Preencha o campo Email';
        }else if(empty($senha)){
            $error['e'] = 'Preencha o campo senha';
        }else{
            $library = new library();
            $dados = $library->login($email,$senha);
            if(is_bool($dados)){
               $saida = 'Falha no login, Senha ou email incorrecto  ';  
            }else{
                    // $_SESSION['id'] = $resultado->id;
                    if($dados->Nivel_acesso == 'Admin'){
                         $_SESSION['Admin'] = $dados->nome;
                         $_SESSION['idAdmin'] = $dados->id_cliente;
                         $saida = 'logado com sucesso';
                    }else if($dados->Nivel_acesso == 'cliente'){
                         $_SESSION['cliente'] = $dados->nome;
                         $_SESSION['idCliente'] = $dados->id_cliente;
                         $saida = 'logado com sucesso';
                    }
                   
            } 
        }
        if(isset($error['e'])){
            $saida = $error['e'];
        }

        echo json_encode($saida);
    
     }
     public function LogOut(){
          if(isset($_SESSION['Admin'])){
               unset($_SESSION['Admin']);
               Store::redirect('Main');
          }else if(isset($_SESSION['cliente'])){
               unset($_SESSION['cliente']);
               Store::redirect('Main');
          }
         
     }
}

