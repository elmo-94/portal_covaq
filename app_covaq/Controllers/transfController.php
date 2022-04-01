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
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
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
        $estado = $this->Model->id_transf > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_transf > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/transferencias', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/transferencias', $aviso, $dados);
            }    
        }
        else{
           
            $aviso[0] = 'Este ministério já existe';
            $this->carregarTemplate('admin/transferencias', $aviso, $dados);
        }
    }

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/transferencias', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('admin/transferencias', $aviso, $dados);

        }
    }
   
}