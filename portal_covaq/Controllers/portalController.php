<?php

include_once 'Model/estatisticasModel.php';

class portalController extends Controller{

    
    public $Model;
    public  $viatModel;

    public function __construct(){

        $this->Model= new estatisticasModel();   
        
    }

    public function index(){

        $dados = $this->Model->estatisticas_administractiva();
        $this->carregarTemplate('include/portal_membro',  $dados, array());       
    }
    public function estatisticas(){
      
        $dados = $this->Model->estatisticas_administractiva();
        $this->carregarTemplate('admin/estatisticas', $dados , array()); 

    }
}