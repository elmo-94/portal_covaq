<?php

include_once 'Model/discipulado/baptismosModel.php';

class baptismoController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new baptismosModel();      
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('discipulado/baptismos', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/baptismos', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('discipulado/baptismos', $instModel);
           
    }
    public function cadastrar(){ 

        $this->Model->id_bap = $_POST['id_bap'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->pastor = $_POST['pastor'];
        $this->Model->localidade = $_POST['localidade'];
        $this->Model->total = $_POST['total'];

        $this->Model->id_bap > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $this->index();

    }

    public function eliminar(){
        $this->Model->delete($_REQUEST['cod']);
        $this->index();
    }
   
}