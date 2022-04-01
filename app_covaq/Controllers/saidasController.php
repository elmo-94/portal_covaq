<?php

include_once 'Model/financas/saidasModel.php';

class saidasController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new saidasModel();      
    }

    public function index(){

        $instModel = new saidasModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/saidas', array(), $dados);   
          
    }
    public function novo(){

        $instModel = new saidasModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/saidas', $instModel, $dados); 
        }      
                   
    }

    public function buscar(){

        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('financas/saidas', $instModel);
           
    }

    public function cadastrar(){
        
        $instModel = new saidasModel();
        $instModel->id_saida = $_POST['id_saida'];
        $instModel->data_reg = $_POST['data_reg'];
        $instModel->destino = $_POST['txtDestino'];
        $instModel->necessidade = $_POST['txtNecessidade'];
        $instModel->valor = $_POST['txtValor'];
        $instModel->observacao = $_POST['txtObs'];
        $estado = $instModel->id_saida > 0 ? $this->Model->editar($instModel) :  $this->Model->registar($instModel);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_saida > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('financas/saidas', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('financas/saidas', $aviso, $dados);
            }    
        }
        else{
           
            $aviso[0] = 'Este ministério já existe';
            $this->carregarTemplate('financas/saidas', $aviso, $dados);
        }

    }



    public function eliminar(){

        $instModel = new saidasModel();
        $estado = $instModel->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('financas/saidas', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('financas/saidas', $aviso, $dados);

        }
    }
   
}