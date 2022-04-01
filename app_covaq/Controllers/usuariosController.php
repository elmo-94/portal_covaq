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

        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
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

        $estado = $inst_Model->id_user > 0 ? $this->Model->editar($inst_Model) :  $this->Model->registar($inst_Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_user > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('usuarios/usuarios', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('usuarios/usuarios', $aviso, $dados);
            }    
        }
        else{
           
            $aviso[0] = 'Este ministério já existe';
            $this->carregarTemplate('usuarios/usuarios', $aviso, $dados);
        }

    }

    public function eliminar(){

        $instModel = new usuarioModel();
        $estado = $instModel->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('usuarios/usuarios', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('usuarios/usuarios', $aviso, $dados);

        }
    }




   
}