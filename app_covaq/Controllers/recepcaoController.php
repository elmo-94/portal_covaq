<?php
include_once 'Model/admin/recepcaoModel.php';

class recepcaoController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new recepcaoModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/recepcao', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/recepcao', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('admin/recepcao', $instModel);
           
    }

    public function cadastrar(){
        $this->Model->id_recep = $_POST['id_recep'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->nome = $_POST['nome'];
        $this->Model->genero = $_POST['genero'];
        $this->Model->origem = $_POST['origem'];
        $this->Model->localidade = $_POST['localidade'];
        $this->Model->estado = $_POST['estado'];
        $estado = $this->Model->id_recep > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_recep > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/recepcao', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/recepcao', $aviso, $dados);
            }
                
        }
        else{
           
            $aviso[0] = 'Este ministério já existe';
            $this->carregarTemplate('admin/recepcao', $aviso, $dados);
        }

    }

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/recepcao', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('admin/recepcao', $aviso, $dados);

        }
    }
   
}