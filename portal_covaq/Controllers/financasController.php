<?php

include_once 'Model/estatisticasModel.php';
  

    
class financasController extends Controller{
    
    public $Model;
    public  $viatModel;

    public function __construct(){

        $this->Model= new estatisticasModel();   
        
    }

    public function index(){
        
        $dados = $this->Model->estatisticas_financeira();
        $this->carregarTemplate('financas/sub_financas', $dados, array());       
    }

    public function estatisticas(){

        $dados = $this->Model->estatisticas_financeira();
        $this->carregarTemplate('financas/estatisticas', $dados, array());       


    }
}