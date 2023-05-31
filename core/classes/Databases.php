<?php
namespace core\classes;
use Exception;
use PDO;
use PDOException;
class Databases{

    private $ligacao;
  
  
  //   =======================================
    private function ligar(){
          $this->ligacao = new PDO(
             
              'mysql:'.
              'host='.MYSQL_SERVER.';'.
              'dbname='.MYSQL_DATABASE.';'.
              'charset='.MYSQL_CHARSET,
              MYSQL_USER,
              MYSQL_PASS,
              array(PDO::ATTR_PERSISTENT => true)
          );
       
          $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      }
      
      private function desligar(){
  
          $this->ligacao = null;
      }
  
      // ===================CRUD=========================
      public function select($sql,$parametros = null){
          $sql = trim($sql);

          if(!preg_match("/^SELECT/i", $sql)){
              throw new Exception('Base de dados - Nao e uma instrucao SELECT.');
          }
  
          $this->ligar();
          $resultados = null;
          try {
              if(!empty($parametros)){
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute($parametros);
                  $resultados = $executar->fetchALL(PDO::FETCH_CLASS);
              }else{
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute();
                  $resultados = $executar->fetchALL(PDO::FETCH_CLASS);
              }
  
  
          } catch (PDOException $e) {
              return false;
          }
  
          $this->desligar();
  

          return $resultados;
      }
  
  
  
      public function insert($sql,$parametros = null){
          $sql = trim($sql);

          if(!preg_match("/^INSERT/i", $sql)){
              throw new Exception('Base de dados - Nao e uma instrucao INSERT.');
          }
  
          $this->ligar();
      
          try {
      
              if(!empty($parametros)){
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute($parametros);
                
              }else{
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute();
              }
  
  
          } catch (PDOException $e) {
        
              return false;
          }
  
          $this->desligar();
  
     
         
      }
  
  
      
      public function update($sql,$parametros = null){
          $sql = trim($sql);

          if(!preg_match("/^UPDATE/i", $sql)){
              throw new Exception('Base de dados - Nao e uma instrucao UPDATE.');
          }
  
          $this->ligar();
      
          try {
       
              if(!empty($parametros)){
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute($parametros);
                
              }else{
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute();
              }
  
  
          } catch (PDOException $e) {
     
              return false;
          }
  
          $this->desligar();
  
  
         
      }
      public function delete($sql,$parametros = null){
          $sql = trim($sql);

          if(!preg_match("/^DELETE/i", $sql)){
              throw new Exception('Base de dados - Nao e uma instrucao DELETE.');
          }
  
          $this->ligar();
      
          try {
          
              if(!empty($parametros)){
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute($parametros);
                
              }else{
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute();
              }
  
  
          } catch (PDOException $e) {
  
              return false;
          }
  
          $this->desligar();
  
      
         
      }
  
  
  
  
      public function statement($sql,$parametros = null){
          $sql = trim($sql);
          if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i", $sql)){
              throw new Exception('Base de dados - Instrucao Invalida.');
          }
  
          $this->ligar();
      
          try {
              if(!empty($parametros)){
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute($parametros);
                
              }else{
                  $executar = $this->ligacao->prepare($sql);
                  $executar->execute();
              }
  
  
          } catch (PDOException $e) {
              return false;
          }
  
          $this->desligar();

         
      }
  }


?>