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
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
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
        $estado = $this->Model->id_obra > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar($this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_obra > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/obras', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/obras', $aviso, $dados);
            }
                
        }
        else{
           
            $aviso[0] = 'Este ministério já existe';
            $this->carregarTemplate('admin/obras', $aviso, $dados);
        }

    }

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/obras', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('admin/obras', $aviso, $dados);

        }
    }
   
}