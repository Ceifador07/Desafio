<?php

namespace core\models;

use core\classes\Databases;

class HelpAdmin
{

  // =====================================================================================================================
  public function RegistarCategoria($nome, $descricao, $status)
  {
    // script para registo das categorias a tabela categoria 
    $db = new Databases();
    $paramentros = [
      ':nome' => trim($nome),
      ':descricao' => trim($descricao),
      ':status' => $status
    ];
    $db->insert("INSERT INTO categoria VALUES(0,:nome,:descricao,:status,NOW())", $paramentros);
    return true;
  }
  public function ActualizarCategoria($id, $nome, $descricao, $status)
  {
    // script para registo das categorias a tabela categoria 
    $db = new Databases();
    $paramentros = [
      ':nome' => trim($nome),
      ':descricao' => trim($descricao),
      ':status' => $status,
      ':id' => $id
    ];
    $db->update("UPDATE categoria SET nomeCategoria = :nome, descricao = :descricao, status = :status where id = :id ", $paramentros);
    return true;
  }

  // Script para o cadastro dos produtos a tabela produtos
  public function RegistarNovoProduto($nome, $categoria, $preco, $quantidade, $descricao,$ext)
  {
    $db = new Databases();

    $pasta ="public/assets/images/";
         
    $nome_actual = md5(uniqid(time())).$ext;
    $tmp = $_FILES['images']['tmp_name']; //caminho temporário da imagem
    $paramentros = [
      ':nome' => $nome,
      ':categoria' => $categoria,
      ':preco' => $preco,
      ':quantidade' => $quantidade,
      ':descricao'=>$descricao,
      ':images' => $nome_actual,
      ':status' => 1
    ];
    $db->insert("INSERT INTO produtos VALUES(0,:nome,:categoria,:preco,:quantidade,:descricao,:images,:status,NOW(),NULL)", $paramentros);
    move_uploaded_file($tmp,$pasta . $nome_actual);
    
  }

  public function ActualizarProduto($id, $nome, $categoria, $preco, $quantidade, $descricao,$nome_actual)
  {
    $db = new Databases();

    $pasta ="public/assets/images/";
         
    // $nome_actual = md5(uniqid(time())).$ext;
    $tmp = $_FILES['images']['tmp_name']; //caminho temporário da imagem
    $paramentros = [
      ':nome' => $nome,
      ':categoria' => $categoria,
      ':preco' => $preco,
      ':quantidade' => $quantidade,
      ':descricao'=>$descricao,
      ':images' => $nome_actual,
      ':status' => 1,
      ':id'=>$id,
    ];
    $dados = $db->update("UPDATE produtos SET nome = :nome, categoria = :categoria, preco =:preco, quantidade = :quantidade, descricao = :descricao,images = :images,status = :status where id = :id", $paramentros);
    move_uploaded_file($tmp,$pasta . $nome_actual);
    return $dados;
    
  }
  public function RemoverProduto($id){
    // script para remover os produtos 
    $db = new Databases();
    $paramentros = [
      ':id'=> $id
    ];
    $db->delete("DELETE FROM produtos where id = :id",$paramentros);
    return true;
  }
  public function RemoverDesabilitarProduto($id,$status){
    // script para desabilitar o produto caso o produto esteja associado a outras tabelas 
    $db = new Databases();
    $paramentros = [
      ':id'=> $id,
      ':status'=>$status
    ];
    $db->update("UPDATE produtos SET status = :status where id= :id",$paramentros);
    return true;

  }
  public function RemoverCategoria($id){
    // script para remover os produtos 
    $db = new Databases();
    $paramentros = [
      ':id'=> $id
    ];
    $db->delete("DELETE FROM categoria where id = :id",$paramentros);
    return true;
  }
  public function RemoverDesabilitarCategoria($id,$status){
    // script para desabilitar o produto caso o produto esteja associado a outras tabelas 
    $db = new Databases();
    $paramentros = [
      ':id'=> $id,
      ':status'=>$status
    ];
    $db->update("UPDATE categoria SET status = :status where id= :id",$paramentros);
    return true;

  }
  public function VerificarProduto($id){
    $db = new Databases();
    $paramentros = [
      ':id'=>$id
    ];
    $result = $db->select("SELECT * FROM pedidos where produtos = :id",$paramentros);
    return $result;
  }
  public function VerificarCategoria($id){
    $db = new Databases();
    $paramentros = [
      ':id'=>$id
    ];
    $result = $db->select("SELECT * FROM produtos where categoria = :id",$paramentros);
    return $result;
  }
  public function VerificarCliente($id){
    $db = new Databases();
    $paramentros = [
      ':id'=>$id
    ];
    $result = $db->select("SELECT * FROM pedidos where cliente = :id",$paramentros);
    return $result;
  }
  public function DesabilitarBloquearCliente($id,$status){
    // script para desabilitar o produto caso o produto esteja associado a outras tabelas 
    $db = new Databases();
    $paramentros = [
      ':id'=> $id,
      ':status'=>$status
    ];
    $db->update("UPDATE clientes SET status = :status where id_clientes= :id",$paramentros);
    return true;
  }
  public function RemoverCliente($id){
    // script para remover os produtos 
    $db = new Databases();
    $paramentros = [
      ':id'=> $id
    ];
    $db->delete("DELETE FROM clientes where id_cliente = :id",$paramentros);
    return true;
  }
}
