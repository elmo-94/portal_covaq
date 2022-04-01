<?php

include_once 'Model/estatisticasModel.php';

class cticController extends Controller{

    
    public $Model;
    public  $viatModel;

    public function __construct(){

        $this->Model= new estatisticasModel();   
        
    }

    public function index(){

        $dados = $this->Model->estatisticas_administractiva();
        $this->carregarTemplate('ctic/ctic',  $dados, array());       
    }
    public function estatisticas(){
      
        $dados = $this->Model->estatisticas_administractiva();
        $this->carregarTemplate('ctic/estatisticas', $dados , array()); 

    }
}