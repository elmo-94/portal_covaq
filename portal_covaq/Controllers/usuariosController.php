<?php

include_once 'Model/usuarios/usuarioModel.php';

class usuariosController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new usuarioModel();      
    }

    public function index(){

        $instModel = new usuarioModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('usuarios/usuarios', array(), $dados);   
          
    }
    public function novo(){

        $instModel = new usuarioModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('usuarios/usuarios', $instModel, $dados); 
        }      
                   
    }

    public function buscar(){

        $viatModel = new usuarioModel();

        if(isset($_REQUEST['texto'])){
           
            $viatModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('usuarios/usuarios', $viatModel);
           
    }

    public function cadastrar(){
        
        $inst_Model = new usuarioModel();
        $inst_Model->id_user = $_POST['id_user'];
        $inst_Model->usuario = $_POST['usuario'];
        $inst_Model->email = $_POST['email'];
        $inst_Model->senha = $_POST['senha'];
        $inst_Model->nivel = $_POST['nivel'];

        $inst_Model->id_user > 0 ? $this->Model->editar($inst_Model) :  $this->Model->registar($inst_Model);
        
        $this->carregarTemplate('include/login');

    }

    public function eliminar(){

        $instModel = new usuarioModel();
        $instModel->delete($_REQUEST['cod']);
        $this->index();
    }




   
}