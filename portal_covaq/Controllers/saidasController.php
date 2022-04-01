<?php

include_once 'Model/financas/saidasModel.php';

class saidasController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new saidasModel();      
    }

    public function index(){

        $instModel = new saidasModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/saidas', array(), $dados);   
          
    }
    public function novo(){

        $instModel = new saidasModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/saidas', $instModel, $dados); 
        }      
                   
    }

    public function buscar(){

        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('financas/saidas', $instModel);
           
    }

    public function cadastrar(){
        
        $instModel = new saidasModel();
        $instModel->id_saida = $_POST['id_saida'];
        $instModel->data_reg = $_POST['data_reg'];
        $instModel->destino = $_POST['txtDestino'];
        $instModel->necessidade = $_POST['txtNecessidade'];
        $instModel->valor = $_POST['txtValor'];
        $instModel->observacao = $_POST['txtObs'];
        $instModel->id_saida > 0 ? $this->Model->editar($instModel) :  $this->Model->registar($instModel);
        
        $this->index();

    }



    public function eliminar(){

        $instModel = new saidasModel();
        $instModel->delete($_REQUEST['cod']);
        $this->index();
    }
   
}