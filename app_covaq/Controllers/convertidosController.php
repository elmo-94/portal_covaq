<?php

include_once 'Model/discipulado/convertidosModel.php';

class convertidosController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model = new convertidosModel();      
        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('discipulado/convertidos', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/convertidos', $instModel, $dados); 

        }             
    }

    public function buscar(){
        
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('discipulado/convertidos',array(), $instModel);
           
    }

    public function cadastrar(){

        $this->Model->id_nc = $_POST['id_nc'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->nome = $_POST['nome'];
        $this->Model->identificacao = $_POST['identificacao'];
        $this->Model->naturalidade = $_POST['naturalidade'];
        $this->Model->genero = $_POST['genero'];
        $this->Model->morada = $_POST['morada'];
        $this->Model->data_nasc = $_POST['data_nasc'];
        $this->Model->telefone = $_POST['telefone'];
        $this->Model->estado = $_POST['estado'];

        $estado = $this->Model->id_nc > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar($this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_nc > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('discipulado/convertidos', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('discipulado/convertidos', $aviso, $dados);
            }    
        }
        else{

            $aviso[0] = 'Não foi possivel salvar este registo';
            $this->carregarTemplate('discipulado/convertidos', $aviso, $dados);
        }

    }

    public function eliminar(){
        $aviso=array();
        $estado = $this->Model->delete($_REQUEST['cod']);
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('discipulado/convertidos', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('discipulado/convertidos', $aviso, $dados);

        };
    }
   
}