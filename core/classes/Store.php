<?php
namespace core\classes;

use Exception;
class Store{

    public static function Layout($estruturas, $dados = null){
         // verifica se estruturas e um array
         if (!is_array($estruturas)) {
            throw new Exception("colecao de estruturas invalida");
        }

        // tratar das variaveis 
        if (!empty($dados) && is_array($dados)) {
            extract($dados);
        }

        // apresentar as views da aplicacao
        foreach ($estruturas as $estrutura) {
            include("core/views/$estrutura.php");
        }
    }
    public static function redirect($rota = '')
    {
        // faz o redirecionamento desejado 

        header("location: " . BASE_URL . "$rota");
    }

}


?>