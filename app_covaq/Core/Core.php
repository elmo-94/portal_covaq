<?php 
//include('protect.php');

class Core{

    public function __construct(){

        $this->run();
        
    }

    public function run()
    {

        $parametro = array();

        if (isset($_GET['pag'])) {
           
            //Login
            $url = $_GET['pag'];
           
        }

       if(!empty($url))//existe metodo
       {
          $url = explode('/',$url);
          $controller = $url[0].'Controller';

          //Retira o primeiro valor do array
          array_shift($url);

            // se o usuario enviou funcao
            if(isset($url[0]) && !empty($url[0])) 
            {
                $metodo = $url[0];
                array_shift($url);
                
            }
            else{

                $metodo = 'index';
            }

            if (count($url) > 0) {
                
                $parametro = $url;
            }
           
       }
       else{      
            $controller = 'homeController';
            $metodo = 'index';
       }

       $caminho = 'app_covaq/Controllers/'.$controller.'.php';

       if(!file_exists($caminho) && !method_exists($controller,$metodo)){
           
        $controller = 'homeController';
        $metodo = 'index';

       }
       
        $core = new $controller;

        call_user_func_array(array($core,$metodo), $parametro);
    
    }

}
