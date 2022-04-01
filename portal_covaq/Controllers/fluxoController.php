<?php

include_once 'Model/financas/fluxoModel.php';

class fluxoController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new fluxoModel();      
    }

    public function index(){

        $instModel = new fluxoModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/fluxo_caixa', array(), $dados);   
          
    }
    public function novo(){
        $instModel = new fluxoModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/fluxo_caixa', $instModel, $dados); 

        }             
    }

    public function buscar(){

        if(isset($_REQUEST['texto'])){
            $instModel = $this->Model->buscar($_REQUEST['texto']);
            $this->carregarTemplate('financas/fluxo_caixa', $instModel);
        }       
       
           
    }

    public function cadViatura()
    {                  
        $this->carregarTemplate('financas/fluxo_caixa');
    }
    public function cadastrar(){
        
        $inst_Model = new fluxoModel();
        $inst_Model->id_mov = $_POST['txtIdMov'];
        $inst_Model->data_reg = $_POST['data_reg'];
        $inst_Model->categoria = $_POST['cmbCategoria'];
        $inst_Model->tipo = $_POST['txtTipo'];
        $inst_Model->valor = $_POST['txtValor'];
        $inst_Model->observacao = $_POST['txtObs'];
        $inst_Model->id_mov > 0 ? $this->Model->editar($inst_Model) :  $this->Model->registar($inst_Model);
        
        $this->index();

    }

    public function eliminar(){

        $viatModel = new fluxoModel();
        $viatModel->delete($_REQUEST['cod']);
        $this->index();
    }
   
}