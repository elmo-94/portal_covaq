<?php

include_once 'Model/financas/entradasModel.php';

class entradasController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new entradasModel();      
    }

    public function index(){

        $instModel = new entradasModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/entradas', array(), $dados);   
          
    }
    public function novo(){

        $instModel = new entradasModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/entradas', $instModel, $dados); 
        }      
                   
    }

    public function buscar(){

        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('financas/entradas', $instModel);
           
    }

    public function cadastrar(){
        
        $instModel = new entradasModel();
        $instModel->id_ent = $_POST['id_ent'];
        $instModel->data_reg = $_POST['data_reg'];
        $instModel->tipo = $_POST['txtTipo'];
        $instModel->doador = $_POST['txtDoador'];
        $instModel->valor = $_POST['txtValor'];
        $instModel->estado = $_POST['cmbEstado'];
        $instModel->id_ent > 0 ? $this->Model->editar($instModel) :  $this->Model->registar($instModel);
        
        $this->index();

    }

    public function eliminar(){

        $instModel = new entradasModel();
        $instModel->delete($_REQUEST['cod']);
        $this->index();
    }
   
}