<?php

include_once 'Model/estatisticasModel.php';
  

    
class discipuladoController extends Controller{
    
    public $Model;
    public  $viatModel;

    public function __construct(){

        $this->Model= new estatisticasModel();   
        
    }

    public function index(){
        
        $dados = $this->Model->estatisticas_discipulado();
        $this->carregarTemplate('discipulado/sub_discipulado', $dados, array());       
    }

    public function estatisticas(){

        $dados = $this->Model->estatisticas_discipulado();
        $this->carregarTemplate('discipulado/estatisticas', $dados, array());       


    }
}