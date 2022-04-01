<?php

include_once 'Model/admin/minModel.php';

class minController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new minModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/ministerios', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/ministerios', $instModel, $dados); 

        }             
    }

    public function buscar(){
        
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('admin/ministerios', $instModel);
           
    }

    public function cadastrar(){

        
       

        $this->Model->id_min = $_POST['id_min'];
        $this->Model->nome = addslashes( $_POST['nome']);
        $this->Model->descricao = addslashes ($_POST['descricao']);
        $this->Model->lider = addslashes($_POST['lider']);

        $estado = $this->Model->id_min > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_min > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/ministerios', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/ministerios', $aviso, $dados);
            }
                
        }
        else{
           
            $aviso[0] = 'Este ministério já existe';
            $this->carregarTemplate('admin/ministerios', $aviso, $dados);
        }


    }

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/ministerios', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('admin/ministerios', $aviso, $dados);

        }
    }

    
}