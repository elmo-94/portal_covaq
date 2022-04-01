<?php

include_once 'Model/admin/transfModel.php';

class transfController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new transfModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/transferencias', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/transferencias', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('admin/transferencias', $instModel);
           
    }

    public function cadastrar(){
        $this->Model->id_transf = $_POST['id_transf'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->motivo = $_POST['motivo'];
        $this->Model->destino = $_POST['destino'];
        $this->Model->localidade = $_POST['localidade'];
        $this->Model->estado = $_POST['estado'];
        $this->Model->id_mem = $_POST['id_mem'];
        $this->Model->id_transf > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $this->index();

    }

    public function eliminar(){
        $this->Model->delete($_REQUEST['cod']);
        $this->index();
    }
   
}