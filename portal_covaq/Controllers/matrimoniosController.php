<?php

include_once 'Model/admin/matrimoniosModel.php';

class matrimoniosController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new matrimoniosModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/matrimonios', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/matrimonios', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('admin/matrimonios', $instModel);
           
    }

    public function cadastrar(){
              
        $this->Model->id_mat = $_POST['id_mat'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->num_reg = $_POST['num_reg'];
        $this->Model->localidade = $_POST['localidade'];
        $this->Model->ministro = $_POST['ministro'];
        $this->Model->id_noivo = $_POST['id_noivo'];
        $this->Model->id_noiva = $_POST['id_noiva'];
        $this->Model->padrinho = $_POST['padrinho'];
        $this->Model->madrinha = $_POST['madrinha'];
        $this->Model->estado = $_POST['estado'];
        $this->Model->id_mat > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $this->index();

    }

    public function eliminar(){
        $this->Model->delete($_REQUEST['cod']);
        $this->index();
    }
   
}