<?php
    namespace core\controllers;

use core\classes\Store;
use core\models\HelpAdmin;
use core\models\library;
    if(!isset($_SESSION['Admin'])){
        Store::redirect('Main');
    }

    class Admin{

        public function index(){
            $library = new library();
            $categorias = $library->ListaCcategorias();
            $produtos = $library->ListaProdutos();
            $clientes = $library->ListaClientes();
            $pedidos = $library->ListaPedidos();
            $PedidoPago = $library->PedidosPagos();
            $PedidoPendente = $library->PedidosPendentes();

            $dados = [
                'categorias'=>$categorias,
                'produtos'=>$produtos,
                'clientes'=>$clientes,
                'pedidos'=>$pedidos,
                'PedidoPago'=>$PedidoPago,
                'PedidoPendente'=>$PedidoPendente,
            ];
            Store::Layout([
                'Admin/layout/header_html',
                'Admin/index',
                'Admin/layout/footer'
            ],$dados);
        }
        public function produts(){
            $library = new library();
            $categorias = $library->ListaCcategorias();
            $produtos = $library->ListaProdutos();
            $dados = [
                'categorias'=>$categorias,
                'produtos'=>$produtos,
            ];
            Store::Layout([
                'Admin/layout/header_html',
                'Admin/produts',
                'Admin/Modal/EditarProduto',
                'Admin/layout/footer'
            ],$dados);
        }
        public function pedidos(){
            $library = new library();
            $categorias = $library->ListaCcategorias();
            $produtos = $library->ListaProdutos();
            $Pedidos = $library->ListaPedidos();
            $dados = [
                'categorias'=>$categorias,
                'produtos'=>$produtos,
                'Pedidos'=>$Pedidos,
            ];
            Store::Layout([
                'Admin/layout/header_html',
                'Admin/pedidos',
                'Admin/layout/footer'
            ],$dados);
        }
        public function AddPedido($id = ''){
            $library = new library();
            $categorias = $library->ListaCcategorias();
            $PedidoEspecifico = $library->PedidoEspecifico($id);
            $clientes = $library->ListaClientes();
            $Pedidos = $library->ListaPedidos();
            $dados = [
                'categorias'=>$categorias,
                'Pedidos'=>$Pedidos,
                'clientes'=>$clientes,
                'PedidoUnico'=>$PedidoEspecifico,
            ];
            Store::Layout([
                'Admin/layout/header_html',
                'Admin/AddPedido',
                'Admin/layout/footer'
            ],$dados);
        }
        public function Detalhes($id){
            
            $library = new library();
            $categorias = $library->ListaCcategorias();
            $produtos = $library->ProdutosEspecifico($id);
            if(!isset($id)  || count($produtos) <= 0 ){
                Store::redirect('Admin/produts');
            }
            $dados = [
                'produtos'=>$produtos,
                'categorias'=>$categorias,
            ];
            Store::Layout([
                'Admin/layout/header_html',
                'Admin/Detalhes',
                'Admin/Modal/EditarProduto',
                'Admin/layout/footer'
            ],$dados);
        }
        public function DetalhePedido($id){
            
            $library = new library();
            $categorias = $library->ListaCcategorias();
            $pedidos = $library->PedidoDoCliente($id);
            if(!isset($pedidos)  || count($pedidos) <= 0 ){
                Store::redirect('Admin/pedidos');
            }
            $dados = [
                'produtos'=>$pedidos,
                'categorias'=>$categorias,
            ];
            Store::Layout([
                'Admin/layout/header_html',
                'Admin/DetalhePedido',
                'Admin/Modal/EditarProduto',
                'Admin/layout/footer'
            ],$dados);
        }
        
        public function cliente(){
            $library = new library();
            $clientes = $library->ListaClientes();
            $dados = [
                'clientes'=> $clientes 
            ];
            Store::Layout([ 
                'Admin/layout/header_html',
                'Admin/cliente',
                'Admin/Modal/EditarCliente',
                'Admin/layout/footer'
            ],$dados);
        }
        public function definicoes(){
            $library = new library();
            $id = $_SESSION['idAdmin'];
            $Nivel = $_SESSION['Admin'];
            $clientes = $library->definicoes($id,$Nivel);
            $dados = [
                'clientes'=> $clientes[0] 
            ];
            Store::Layout([
                'Admin/layout/header_html',
                'Admin/definicoes',
                'Admin/Modal/EditarCliente',
                'Admin/layout/footer'
            ],$dados);
        }
      
        public function categoria(){
            $library = new library();
            $categorias = $library->ListaCcategorias();
            $dados = [
                'categorias'=>$categorias
            ];
          Store::Layout([
               'Admin/layout/header_html',
               'Admin/categoria',
               'Admin/Modal/EditarCategoria',
               'Admin/layout/footer',
           ],$dados);
        }
        public function DetalheCliente($id){
            
            $library = new library();
            $clientes = $library->ClienteEspecifico($id);
            $Pedidos = $library->PedidoDoCliente($id);
            if(!isset($id)  || count($clientes) <= 0 ){
                Store::redirect('Admin/cliente');
            }
            $dados = [
                'clientes'=>$clientes,
                'Pedidos'=>$Pedidos,
            ];
            Store::Layout([
                'Admin/layout/header_html',
                'Admin/DetalheCliente',
                'Admin/Modal/EditarCliente',
                'Admin/layout/footer'
            ],$dados);
        }


        public function DadosProduto(){
             $saida = '';
             $id = filter_input(INPUT_POST,'id');

             if(empty($id)){
                $saida = 'Nenhum Produto seleccionado';
             }else{
                $library = new library();
                $saida = $library->ProdutosEspecifico($id);
             }
             echo json_encode($saida);
        }
       
       
        public function RegistarProduts(){
            $saida = '';

            $nome = filter_input(INPUT_POST,'nome');
            $categoria = filter_input(INPUT_POST,'categoria');
            $preco = filter_input(INPUT_POST,'preco');
            $quantidade = filter_input(INPUT_POST,'quantidade');
            
            $descricao = filter_input(INPUT_POST,'descricao');
            
            // extensoes permitidas para o registo da imagem
            $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
            $images = $_FILES['images']['name'];
            // pegar a extensao do arquivo
            $ext = strtolower(strrchr($images,"."));

            if(empty($nome)){
                $saida = 'Preencha o campo nome do Produto';
            }else if(empty($categoria)){
                $saida = 'Escolha a Categpria do Produto';
            }else if(empty($preco)){
                $saida = 'Escolha a Preco do Produto';
            }else if(!in_array($ext,$permitidos)){
                $saida = 'O arquivo Seleccionado não é valido';
            }else if(empty($descricao)){
                $saida = 'Preencha o Campo Descricao';
            }else{
                $Help = new HelpAdmin();
                $Help->RegistarNovoProduto($nome,$categoria,$preco,$quantidade, $descricao,$images,$ext);
                $saida = 'Produto Registado com sucesso';
            }
            echo json_encode($saida);
        }

        public function ActualizarProduto(){
            $saida = '';

            $id = filter_input(INPUT_POST,'id_Produto');
            $nome = filter_input(INPUT_POST,'nome');
            $categoria = filter_input(INPUT_POST,'categoria');
            $preco = filter_input(INPUT_POST,'preco');
            $quantidade = filter_input(INPUT_POST,'quantidade');
            $descricao = filter_input(INPUT_POST,'descricao');
              // extensoes permitidas para o registo da imagem
              $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");
              $nome_actual ='';
              
              
            // Ir em busca da imagem do produto em caso do usuario nao actualizar a imagem 
            if(empty($_FILES['images']['name'])){
                $library = new library();
                $Produtos = $library->ProdutoImages($id);
                $nome_actual = $Produtos[0]->images;
         
            }else{
                  // pegar a extensao do arquivo
                $images = $_FILES['images']['name'];
                $ext = strtolower(strrchr($images,"."));
            }
         
            if(!empty($images = $_FILES['images']['name'])){

                if(!in_array($ext,$permitidos)){
                    $saida = 'O arquivo Seleccionado não é valido';
                }else{
                    $nome_actual = md5(uniqid(time())).$ext;
                }
            }

            if(empty($nome)){
                $saida = 'Preencha o campo nome do Produto';
            }else if(empty($categoria)){
                $saida = 'Escolha a Categpria do Produto';
            }else if(empty($preco)){
                $saida = 'Escolha a Preco do Produto';
            }else if(empty($descricao)){
                $saida = 'Preencha o Campo Descricao';
            }else{
                $Help = new HelpAdmin();
                $Help->ActualizarProduto($id, $nome,$categoria,$preco,$quantidade, $descricao,$nome_actual);
                $saida = 'Produto Actualizado com sucesso';
            }
            echo json_encode($saida);
        }

        public function DeletarProduto(){
            $saida = '';
            $id = filter_input(INPUT_POST,'id');
            $status = filter_input(INPUT_POST,'status');
            $Help = new HelpAdmin();
            // Verificar se o Produto consta na tabela pedidos ou nao, se nao consta sera removido
            $pedidos = $Help->VerificarProduto($id);
            // verificar se o id do produto esta vazio 

            if(empty($id)){
                $saida = 'Nenhum Produto Selecionado ';
            }else if(count($pedidos) > 0 ){
                $Help->RemoverDesabilitarProduto($id,$status);
                $saida = 'Removido com sucesso';
            }else{
                $dados = $Help->RemoverProduto($id);
                $saida = 'Removido com sucesso';
            }

            echo json_encode($saida);
        }


        public function RegistarCategoria(){
            $saida = '';
            $nome = filter_input(INPUT_POST,'nome');
            $descricao = filter_input(INPUT_POST,'descricao');
            $status = filter_input(INPUT_POST,'status');
          
            if(empty($nome)){
                $saida = 'Preencha o campo nome da categoria';
            }else if(empty($descricao)){
                $saida = 'Preencha o campo descricao';
            }else{
                $library = new HelpAdmin();
                $library->RegistarCategoria($nome,$descricao,$status);
                $saida = 'Categoria Registada com sucesso';
            }
            echo json_encode($saida);
        }
        public function ActualizarCategoria(){
            $saida = '';
            $id = filter_input(INPUT_POST,'id_categoria');
            $nome = filter_input(INPUT_POST,'Nomecategoria');
            $descricao = filter_input(INPUT_POST,'descricao');
            $status = filter_input(INPUT_POST,'status');
          
            if(empty($nome)){
                $saida = 'Preencha o campo nome da categoria';
            }else if(empty($descricao)){
                $saida = 'Preencha o campo descricao';
            }else{
                $library = new HelpAdmin();
                $library->ActualizarCategoria($id,$nome,$descricao,$status);
                $saida = 'Categoria Registada com sucesso';
            }
            echo json_encode($saida);
        }



        public function RemoverCategoria(){
            $saida = '';
            $id = filter_input(INPUT_POST,'id');
            $status = filter_input(INPUT_POST,'status');
            $Help = new HelpAdmin();
            // Verificar se a Categoria consta na tabela Produtos ou nao, se nao consta sera removido
            $categorias = $Help->VerificarCategoria($id);
            // verificar se o id da categoria esta vazio 
            if(empty($id)){
                $saida = 'Nenhum Produto Selecionado ';
            }else if(count($categorias) > 0 ){
                $Help->RemoverDesabilitarCategoria($id,$status);
                $saida = 'Removido com sucesso';
            }else{
                $dados = $Help->RemoverCategoria($id);
                $saida = 'Removido com sucesso';
            }

            echo json_encode($saida);
        }
       
        public function DadosCategoria(){
            $saida = '';
            $id = filter_input(INPUT_POST,'id');

            if(empty($id)){
               $saida = 'Nenhum Produto seleccionado';
            }else{
               $library = new library();
               $saida = $library->CategoriaEspecifica($id);
            }
            echo json_encode($saida);
       }

       public function DeletarCliente(){
        $saida = '';
        $id = filter_input(INPUT_POST,'id');
        $status = filter_input(INPUT_POST,'status');
        $Help = new HelpAdmin();
        // Verificar se a Categoria consta na tabela Produtos ou nao, se nao consta sera removido
        $categorias = $Help->VerificarCliente($id);
        // verificar se o id da categoria esta vazio 
        if(empty($id)){
            $saida = 'Nenhum Cliente Selecionado ';
        }else if(count($categorias) > 0 ){
            $Help->DesabilitarBloquearCliente($id,$status);
            $saida = 'Removido com sucesso';
        }else{
            $dados = $Help->RemoverCliente($id);
            $saida = 'Removido com sucesso';
        }

        echo json_encode($saida);
        }

        public function ProdutoEspecidico(){
            $saida = '';
            $response = '';
            $library = new library();
            $id =$_POST['id'];
            $dados = $library->ProdutoBusca($id);
            echo json_encode($dados);
        }


        // Registar CLientes e atualizaar nos metodos a baixo 
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
    }
