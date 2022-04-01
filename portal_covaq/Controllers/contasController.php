<?php

include_once 'Model/financas/contasModel.php';

class contasController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new contasModel();      
    }

    public function index(){

        $instModel = new contasModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/pagar', array(), $dados);   
          
    }
    public function novo(){

        $instModel = new contasModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/pagar', $instModel, $dados); 
        }      
                   
    }

    public function buscar(){

        $viatModel = new contasModel();

        if(isset($_REQUEST['texto'])){
           
            $viatModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('financas/pagar', $viatModel);
           
    }

    public function cadastrar(){
        
        $inst_Model = new contasModel();
        $inst_Model->id_conta = $_POST['id_conta'];
        $inst_Model->data_reg = date("Y-m-d H:i:s");
        $inst_Model->conta = $_POST['txtConta'];
        $inst_Model->tipo = $_POST['cmbTipo'];
        $inst_Model->data_venc = $_POST['data_venc'];
        $inst_Model->id_tipopag = $_POST['cmbTipopag'];
        $inst_Model->valor = $_POST['txtValor'];
        $inst_Model->estado = $_POST['cmbEstado'];
        $inst_Model->id_conta > 0 ? $this->Model->editar($inst_Model) :  $this->Model->registar($inst_Model);
        
        $this->index();

    }

    public function eliminar(){

        $instModel = new contasModel();
        $instModel->delete($_REQUEST['cod']);
        $this->index();
    }





    //METODOS PARA CONTAS A RECEBER

    public function indexR(){

        $instModel = new contasModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/receber', array(), $dados);   
          
    }
    public function novoR(){

        $instModel = new contasModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/receber', $instModel, $dados); 
        }      
                   
    }

    public function buscarR(){

        $viatModel = new contasModel();

        if(isset($_REQUEST['texto'])){
           
            $viatModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('financas/receber', $viatModel);
           
    }

    public function cadastrarR(){
        
        $inst_Model = new contasModel();
        $inst_Model->id_conta = $_POST['id_conta'];
        $inst_Model->data_reg = date("Y-m-d H:i:s");
        $inst_Model->conta = $_POST['txtConta'];
        $inst_Model->tipo = $_POST['cmbTipo'];
        $inst_Model->data_venc = $_POST['data_venc'];
        $inst_Model->id_tipopag = $_POST['cmbTipopag'];
        $inst_Model->valor = $_POST['txtValor'];
        $inst_Model->estado = $_POST['cmbEstado'];
        $inst_Model->id_conta > 0 ? $this->Model->editar($inst_Model) :  $this->Model->registar($inst_Model);
        
        $this->index();

    }

   
}