<?php

include_once 'Model/financas/entradasModel.php';

class entradasController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new entradasModel();      
    }

    public function index(){

        $instModel = new entradasModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/entradas', array(), $dados);   
          
    }
    public function novo(){

        $instModel = new entradasModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/entradas', $instModel, $dados); 
        }      
                   
    }

    public function buscar(){

        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('financas/entradas', $instModel);
           
    }

    public function cadastrar(){
        
        $instModel = new entradasModel();
        $instModel->id_ent = $_POST['id_ent'];
        $instModel->data_reg = $_POST['data_reg'];
        $instModel->tipo = $_POST['txtTipo'];
        $instModel->doador = $_POST['txtDoador'];
        $instModel->valor = $_POST['txtValor'];
        $instModel->estado = $_POST['cmbEstado'];
        $estado = $instModel->id_ent > 0 ? $this->Model->editar($instModel) :  $this->Model->registar($instModel);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_ent > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('financas/entradas', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('financas/entradas', $aviso, $dados);
            }    
        }
        else{
            $aviso[0] = 'Não foi possivel salvar este registo';
            $this->carregarTemplate('financas/entradas', $aviso, $dados);
        }

    }

    public function eliminar(){

        $instModel = new entradasModel();
        $estado = $instModel->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('financas/entradas', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('financas/entradas', $aviso, $dados);

        };
    }
   
}