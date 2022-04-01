<?php

include_once 'Model/financas/dizimosModel.php';

class dizimosController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new dizimosModel();      
        
    }

    public function index(){

        $instModel = new dizimosModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/dizimos', array(), $dados);   
          
    }
    public function relatorio(){

        $instModel = new dizimosModel();
        $dados = $instModel->listar_consulta(); 
        $this->carregarTemplate('financas/consultar_dizimo', array(), $dados);   
          
    }
    public function relatorio_consultar(){
        $instModel = new dizimosModel();
        $dados = $instModel->listar();
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar_dados($_POST['texto']);
        }
        $this->carregarTemplate('financas/consultar_dizimo', $instModel, $dados);
           
    }
    public function novo(){
        $instModel = new dizimosModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/dizimos', $instModel, $dados); 

        }             
    }

    public function buscar(){
        $instModel = new dizimosModel();
        $dados = $instModel->listar();
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('financas/dizimos', $instModel, $dados);
           
    }


    public function cadastrar(){
        $instModel = new dizimosModel();
        $instModel->id_diz = $_POST['txtIdDiz'];
        $instModel->data_reg = $_POST['data_reg'];
        $instModel->mes = $_POST['cmbMes'];
        $instModel->id_tipopag = $_POST['cmbTipopag'];
        $instModel->semana = $_POST['cmbSemana'];
        $instModel->valor = $_POST['txtValor'];
        $instModel->id_mem = $_POST['id_mem'];

        $estado = $instModel->id_diz > 0 ? $this->Model->editar($instModel) :  $this->Model->registar($instModel);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_diz > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('financas/dizimos', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('financas/dizimos', $aviso, $dados);
            }    
        }
        else{
            $aviso[0] = 'Não foi possivel salvar este registo';
            $this->carregarTemplate('financas/dizimos', $aviso, $dados);
        }

    }

    public function eliminar(){
        $instModel = new dizimosModel();
        $estado = $instModel->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('financas/dizimos', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('financas/dizimos', $aviso, $dados);

        };
    }
   
}