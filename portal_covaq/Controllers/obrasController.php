<?php

include_once 'Model/admin/obrasModel.php';

class obrasController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new obrasModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/obras', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/obras', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('admin/obras', $instModel);
           
    }

    public function cadastrar(){

        $this->Model->id_obra = $_POST['id_obra'];
        $this->Model->descricao = $_POST['descricao'];
        $this->Model->localidade = $_POST['localidade'];
        $this->Model->data_inicio = $_POST['data_inicio'];
        $this->Model->financiador = $_POST['financiador'];
        $this->Model->data_fim = $_POST['data_fim'];
        $this->Model->orcamento = $_POST['orcamento'];
        $this->Model->estado = $_POST['estado'];
        $this->Model->id_obra > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar($this->Model);
        
        $this->index();

    }

    public function eliminar(){
        $this->Model->delete($_REQUEST['cod']);
        $this->index();
    }
   
}