<?php

include_once 'Model/estatisticasModel.php';

class patrimonioController extends Controller{

    
    public $Model;
    public  $viatModel;

    public function __construct(){

        $this->Model= new estatisticasModel();   
        
    }

    public function index(){

        $dados = $this->Model->estatisticas_administractiva();
        $this->carregarTemplate('patrimonio/patrimonio',  $dados, array());       
    }
    public function estatisticas(){
      
        $dados = $this->Model->estatisticas_administractiva();
        $this->carregarTemplate('patrimonio/estatisticas', $dados , array()); 

    }
}