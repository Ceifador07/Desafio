<?php

namespace core\controllers;

use core\classes\Store;
use core\models\library;

if (!isset($_SESSION['cliente'])) {
    Store::redirect('Main');
}
class Cliente
{
    // Metodo para o acesso a pagina inicial/Painel do Cliente
    public function index()
    {
        $library = new library();
        $id = $_SESSION['idCliente'];
        $pedidos = $library->PedidoDoCliente($id);
        $pedidosPagos = $library->PedidosPagosEspecifico($id);
        $dados = [
            'pedidosPagos' => $pedidosPagos,
            'pedidos' => $pedidos,
        ];
        Store::Layout([
            'Cliente/layout/header_html',
            'Cliente/index',
            'Cliente/layout/footer',
        ], $dados);
    }
    public function produts()
    {
        $library = new library();
        $categorias = $library->ListaCcategorias();
        $produtos = $library->ListaProdutos();
        $dados = [
            'categorias' => $categorias,
            'produtos' => $produtos,
        ];
        Store::Layout([
            'Cliente/layout/header_html',
            'Cliente/produts',
            'Cliente/layout/footer'
        ], $dados);
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
            'Cliente/layout/header_html',
            'Cliente/Detalhes',
            'Cliente/Modal/AddPedido',
            'Cliente/layout/footer'
        ],$dados);
    }
    // Metodo para o acesso a pagina definiçoes do cliente, para casos de alteração de dados
    public function settings()
    {
        $library = new library();
            $id = $_SESSION['idCliente'];
            $Nivel = $_SESSION['cliente'];
            $clientes = $library->definicoes($id,$Nivel);
            $dados = [
                'clientes'=> $clientes[0] 
            ];

        Store::Layout([
            'Cliente/layout/header_html',
            'Cliente/definicoes',
            'Cliente/layout/footer',
        ],$dados);
    }
    // Metodo para o acesso a pagina dos pedidos do cliente no seu painel de control 
    public function Pedidos()
    {
        $library = new library();
        $pedidos = $library->PedidoDoCliente($_SESSION['idCliente']);
        $dados = [
            'pedidos' => $pedidos
        ];
        Store::Layout([
            'Cliente/layout/header_html',
            'Cliente/Pedidos',
            'Cliente/layout/footer',
        ], $dados);
    }
    public function AddPedido($id = '')
    {
        $library = new library();
        $categorias = $library->ListaCcategorias();
        $PedidoEspecifico = $library->PedidoEspecifico($id);
        $clientes = $library->ListaClientes();
        $Pedidos = $library->ListaPedidos();
        $dados = [
            'categorias' => $categorias,
            'Pedidos' => $Pedidos,
            'clientes' => $clientes,
            'PedidoUnico' => $PedidoEspecifico,
        ];
        Store::Layout([
            'Cliente/layout/header_html',
            'Cliente/AddPedido',
            'Cliente/layout/footer'
        ], $dados);
    }
    public function notificacao()
    {
        // $library = new library();
        // $categorias = $library->ListaCcategorias();
        // $clientes = $library->ListaClientes();
        // $Pedidos = $library->ListaPedidos();
        // $dados = [
        //     'categorias' => $categorias,
        //     'Pedidos' => $Pedidos,
        //     'clientes' => $clientes,
        // ];
        Store::Layout([
            'Cliente/layout/header_html',
            'Cliente/notificacao',
            'Cliente/layout/footer'
        ]);
    }
}
