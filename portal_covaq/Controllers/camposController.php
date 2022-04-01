<?php

include_once 'Model/discipulado/camposModel.php';

class camposController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new camposModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('discipulado/campos', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/campos', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('discipulado/campos', $instModel);
           
    }


    public function cadastrar(){ 

        $this->Model->id_camp = $_POST['id_camp'];
        $this->Model->localidade = $_POST['localidade'];
        $this->Model->data_fund = $_POST['data_fund'];
        $this->Model->id_mem = $_POST['id_mem'];
    
        $this->Model->id_camp > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $this->index();

    }

    public function eliminar(){
        $this->Model->delete($_REQUEST['cod']);
        $this->index();
    }
   
}