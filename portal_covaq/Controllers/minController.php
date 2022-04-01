<?php

include_once 'Model/admin/minModel.php';

class minController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new minModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/ministerios', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/ministerios', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('admin/ministerios', $instModel);
           
    }

    public function cadastrar(){
        $instModel = new minModel();
        $this->Model->id_min = $_POST['id_min'];
        $this->Model->nome = $_POST['nome'];
        $this->Model->descricao = $_POST['descricao'];
        $this->Model->lider = $_POST['lider'];
        $this->Model->id_min > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $this->index();

    }

    public function eliminar(){
        $this->Model->delete($_REQUEST['cod']);
        $this->index();
    }
   
}