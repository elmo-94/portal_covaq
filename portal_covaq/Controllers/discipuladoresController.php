<?php

include_once 'Model/discipulado/discipuladoresModel.php';

class discipuladoresController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model = new discipuladoresModel();       
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('discipulado/discipuladores', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/discipuladores', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('discipulado/discipuladores', $instModel);
           
    }

    public function cadastrar(){
              
        $this->Model->id_discip = $_POST['id_discip'];
        $this->Model->data_reg = date("Y-m-d");
        $this->Model->id_mem = $_POST['id_mem'];
        $this->Model->localidade = $_POST['localidade'];
        $this->Model->estado = $_POST['estado'];
        $this->Model->id_discip > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $this->index();

    }

    public function eliminar(){
        $this->Model->delete($_REQUEST['cod']);
        $this->index();
    }
   
}