<?php

include_once 'Model/estatisticasModel.php';

class covaqsolController extends Controller{

    
    public $Model;
    public  $viatModel;

    public function __construct(){

        $this->Model= new estatisticasModel();   
        
    }

    public function index(){

        $dados = $this->Model->estatisticas_administractiva();
        $this->carregarTemplate('covaqsol/covaqsol',  $dados, array());       
    }
    public function estatisticas(){
      
        $dados = $this->Model->estatisticas_administractiva();
        $this->carregarTemplate('admin/estatisticas', $dados , array()); 

    }
}