<?php
use core\controllers\Admin;
use core\controllers\Main;

class router{
  
    var $controller = 'Main';
    var $metodo = 'index';
    var $parametro = [];

    public function __construct(){
        $url = $this->parseURL();
        
        if(isset($url[0]) && file_exists('core/controllers/' . $url[0] . '.php'))
        {
            $this->controller = $url[0];  
            unset($url[0]);
        }
         $arg = "core\\controllers\\{$this->controller}";
        $this->controller = new  $arg() ;
        if(isset($url[1]) && method_exists($this->controller, $url[1]))
        {
           
            $this->metodo =$url[1];
            unset($url[1]);
        }

        $this->parametro = $url ? array_values($url) : [];
        call_user_func_array([$this->controller , $this->metodo], $this->parametro);
    }
    
    private function parseURL(){
        if(isset($_GET['url'])){
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

    // parte dois

    
}