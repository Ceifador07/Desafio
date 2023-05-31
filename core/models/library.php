<?php

namespace core\models;

use core\classes\Databases;

class library
{


    // =====================================================================================================================

    public function CadastrarCliente($nome, $apelido, $email, $sexo, $senha)
    {
        $db = new Databases();
        $paramentros = [
            ':nome' => trim($nome),
            ':apelido' => trim($apelido),
            ':sexo' => trim($sexo),
            ':email' => trim($email),
            ':senha' => md5($senha),
            ':nivel' => 'cliente',
            ':status' => 1,
        ];
        $db->insert("INSERT INTO clientes VALUES(0,:nome,:apelido,:sexo,:email,:senha,:nivel,:status,NOW(),NULL)", $paramentros);
        return true;
    }
    public function ActualizarCliente($id, $nome, $apelido, $email, $sexo, $status)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => trim($id),
            ':nome' => trim($nome),
            ':apelido' => trim($apelido),
            ':sexo' => trim($sexo),
            ':email' => trim($email),
            ':status' => $status
        ];

        $db->update("UPDATE clientes SET nome = :nome,apelido = :apelido, sexo = :sexo,email = :email, status=:status where id_cliente = :id", $paramentros);
        return true;
    }
    // =====================================================================================================================
    public function ListaClientes()
    {
        $db = new Databases();
        $result = $db->select("SELECT * FROM clientes where  Nivel_acesso = 'cliente' and status = 1");
        return $result;
    }
    // =====================================================================================================================
    public function definicoes($id,$Nivel)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => trim($id),
            ':nivel'=>$Nivel
        ];
        $result = $db->select("SELECT * FROM clientes where id_cliente = :id and nome = :nivel", $paramentros);
        return $result;
    }
    // =====================================================================================================================
    public function DadosCliente($id)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => trim($id)
        ];
        $result = $db->select("SELECT * FROM clientes where id_cliente = :id and Nivel_acesso = 'cliente'", $paramentros);
        return $result;
    }
    public function ListaCcategorias()
    {
        $db = new Databases();
        $result = $db->select("SELECT * FROM categoria");
        return $result;
    }
    public function ListaProdutos()
    {
        $db = new Databases();
        $result = $db->select("SELECT p.id, p.nome,p.quantidade,p.preco,p.status,p.images,p.descricao,c.nomecategoria as categoria FROM produtos p inner join categoria c on p.categoria = c.id where p.status = 1");
        return $result;
    }
    public function ProdutosEspecifico($id)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => $id
        ];
        $result = $db->select("SELECT p.id, p.nome,p.quantidade,p.preco,p.status,p.images,p.descricao,c.nomecategoria as categoria FROM produtos p inner join categoria c on p.categoria = c.id where p.id = :id", $paramentros);
        return $result;
    }
    public function ProdutoImages($id)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => trim($id)
        ];
        $result = $db->select("SELECT images FROM produtos WHERE id = :id", $paramentros);
        return $result;
    }
    public function CategoriaEspecifica($id)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => $id
        ];
        $result = $db->select("SELECT * FROM categoria  where id = :id", $paramentros);
        return $result;
    }

    public function ClienteEspecifico($id)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => $id
        ];
        $result = $db->select("SELECT * FROM clientes  where id_cliente = :id", $paramentros);
        return $result;
    }
    public function PedidoDoCliente($id)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => $id
        ];
        $result = $db->select("SELECT pr.id as produtos,pr.images,pr.preco,cl.nome as cliente,p.id,p.quantidade,pr.nome,p.data,p.status FROM pedidos p inner join produtos pr on p.produtos = pr.id inner join clientes cl on cl.id_cliente = p.cliente  where p.cliente = :id", $paramentros);
        return $result;
    }
    public function ListaPedidos()
    {
        $db = new Databases();
        $result = $db->select("SELECT cl.id_cliente,p.id,pr.id as id_produto,pr.nome as produto, cl.nome as cliente, p.quantidade,p.status FROM pedidos p inner join produtos pr on p.produtos = pr.id inner join clientes cl on cl.id_cliente = p.cliente");
        return $result;
    }
    public function PedidosPagos()
    {
        $db = new Databases();
        $result = $db->select("SELECT * FROM pedidos where status = 'Pago' ");
        return $result;
    }
    public function PedidosPendentes()
    {
        $db = new Databases();
        $result = $db->select("SELECT * FROM pedidos where status = 'Em Aberto' ");
        return $result;
    }

    public function PedidosPagosEspecifico($id)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => $id
        ];
        $result = $db->select("SELECT * FROM pedidos where cliente = :id and status = 'Pago' ",$paramentros);
        return $result;
    }
    public function ProdutoBusca($id)
    {
        $db = new Databases();
        $paramentros = [
            ':categoria' => $id,
            ':status' => 1
        ];
        $result = $db->select("SELECT * FROM produtos where categoria = :categoria and status = :status", $paramentros);
        return $result;
    }
    public function VerificarQuantidade($produto)
    {
        $paramentros = [
            ':produto' => $produto
        ];
        $db = new Databases();
        $result = $db->select("SELECT quantidade FROM produtos where id = :produto", $paramentros);
        return $result;
    }
    public function RegistarPedido($nome, $produto, $quantidade, $status)
    {

        $db = new Databases();
        $paramentros = [
            ':produtos' => $produto,
            ':cliente' => $nome,
            ':quantidade' => $quantidade,
            ':status' => $status,
        ];
        
        $db->insert("INSERT INTO pedidos VALUES(0,:produtos,:cliente,:quantidade,:status,NOW())", $paramentros);
        return true;
    }
    public function NovaQuantidade($Qtty1, $produto)
    {
        $db = new Databases();
        $paramentros = [
            ':NovaQtty' => $Qtty1,
            ':produto' => $produto
        ];
        $db->update("UPDATE produtos SET quantidade = :NovaQtty where id = :produto", $paramentros);
        return true;
    }

    public function PedidoEspecifico($id)
    {
        $db = new Databases();
        $paramentros = [
            ':id' => $id
        ];
        $result = $db->select("SELECT pr.id as id_produto,cl.id_cliente, p.id,pr.nome as produto, cl.nome as cliente, p.quantidade,p.status FROM pedidos p inner join produtos pr on p.produtos = pr.id inner join clientes cl on cl.id_cliente = p.cliente where p.id = :id", $paramentros);
        return $result;
    }

    public function VerificarStatus($id)
    {
        $paramentros = [
            ':produto' => $id
        ];
        $db = new Databases();
        $result = $db->select("SELECT status FROM pedidos where id = :produto", $paramentros);
        return $result;
    }
    public function VerificarQuantidadePedido($id)
    {
        $paramentros = [
            ':produto' => $id
        ];
        $db = new Databases();
        $result = $db->select("SELECT quantidade FROM pedidos where id = :produto", $paramentros);
        return $result;
    }
    public function ActualizarPedido($id, $nome, $produto, $QttNova)
    {
        $paramentros = [
            ':id' => $id,
            ':produtos' => $produto,
            ':cliente' => $nome,
            ':quantidade' => $QttNova,
        ];
        $db = new Databases();
        $result = $db->update("UPDATE pedidos SET produtos = :produtos, cliente = :cliente, quantidade = :quantidade where id = :id", $paramentros);
        return $result;
    }
    public function ActualizarQuantidadePedido( $nome, $produto, $QttNova)
    {
        $paramentros = [
            ':produtos' => $produto,
            ':cliente' => $nome,
            ':quantidade' => $QttNova,
        ];
        $db = new Databases();
        $result = $db->update("UPDATE pedidos SET produtos = :produtos, quantidade = :quantidade where produtos = :produtos and cliente = :cliente and status != 'Pago'", $paramentros);
        return $result;
    }

    public function EstadoPedidos($id, $status)
    {
        $paramentros = [
            ':status' => $status,
            ':id' => $id,
        ];
        $db = new Databases();
        $result = $db->update("UPDATE pedidos SET status = :status  where id = :id", $paramentros);
        return $result;
    }
    public function VerificarProdutoPedido($produto,$nome){
        $paramentros = [
            ':produto' => $produto,
            ':nome' => $nome,
        ];
        $db = new Databases();
        $result = $db->select("SELECT quantidade FROM pedidos where produtos = :produto and cliente = :nome and status != 'Pago'", $paramentros);
        return $result;

    }
    public function RemoverPedido($id)
    {
        $paramentros = [
            ':id' => $id,
        ];
        $db = new Databases();
        $result = $db->delete("DELETE FROM pedidos  where id = :id", $paramentros);
        return $result;
    }

    public function login($email,$senha)
    {
        $db = new Databases();
        $paramentos = [
            ':email' =>$email,
            ':senha'=>md5($senha)
        ];

        $retorno = $db->select("SELECT * from clientes where email = :email and senha = :senha and status = 1", $paramentos);
        if(count($retorno) != 1){
            return false;   
        }else{
            $usuario = $retorno[0];
            // if (!password_verify(md5($senha), $usuario->senha)) {
            // if ($senha === $usuario->senha) {
                // password invalida
                // return false;
            // } else {
                // login valido
                return $usuario;
            // }
        }
    }
}
