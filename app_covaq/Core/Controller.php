<?php
//include('protect.php');
class Controller{

    public $dados;
    public $dados2;

    public function __construct(){

        $this->dados = array();
    }

    public function carregarTemplate($nomeView, $dadosModel = array(), $dados2 = array()){

        $this->dados = $dadosModel;      
        $this->dados2 = $dados2;
        require 'Views/include/template.php';
        
    }

    public function carregarViewNoTemplate($nomeView, $dadosModel = array(), $dados2 = array())
    {       
        //extract($dadosModel);
        
        require 'Views/'.$nomeView.'.php';
    }
}
?>