<?php

include_once 'Model/discipulado/convertidosModel.php';

class convertidosController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model = new convertidosModel();      
        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('discipulado/convertidos', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/convertidos', $instModel, $dados); 

        }             
    }

    public function buscar(){

        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('discipulado/convertidos', $instModel);
           
    }

    public function cadastrar(){

        $this->Model->id_nc = $_POST['id_nc'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->nome = $_POST['nome'];
        $this->Model->identificacao = $_POST['identificacao'];
        $this->Model->naturalidade = $_POST['naturalidade'];
        $this->Model->genero = $_POST['genero'];
        $this->Model->morada = $_POST['morada'];
        $this->Model->data_nasc = $_POST['data_nasc'];
        $this->Model->telefone = $_POST['telefone'];
        $this->Model->estado = $_POST['estado'];

        $this->Model->id_nc > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar($this->Model);
        
        $this->index();

    }

    public function eliminar(){
        $this->Model->delete($_REQUEST['cod']);
        $this->index();
    }
   
}