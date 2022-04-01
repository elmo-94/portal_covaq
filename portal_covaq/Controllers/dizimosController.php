<?php

include_once 'Model/financas/dizimosModel.php';

class dizimosController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new dizimosModel();      
        
    }

    public function index(){

        $instModel = new dizimosModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/dizimos', array(), $dados);   
          
    }
    public function novo(){
        $instModel = new dizimosModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/dizimos', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('financas/dizimos', $instModel);
           
    }

    public function cadastrar(){
        $instModel = new dizimosModel();
        $instModel->id_diz = $_POST['txtIdDiz'];
        $instModel->data_reg = date("Y-m-d H:i:s");
        $instModel->mes = $_POST['cmbMes'];
        $instModel->id_tipopag = $_POST['cmbTipopag'];
        $instModel->semana = $_POST['cmbSemana'];
        $instModel->valor = $_POST['txtValor'];
        $instModel->observacao = $_POST['txtObs'];
        $instModel->id_mem = $_POST['cmbMembro'];

        $instModel->id_diz > 0 ? $this->Model->editar($instModel) :  $this->Model->registar($instModel);
        
        $this->index();

    }

    public function eliminar(){
        $instModel = new dizimosModel();
        $instModel->delete($_REQUEST['cod']);
        $this->index();
    }
   
}