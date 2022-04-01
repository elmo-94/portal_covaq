<?php

include_once 'Model/financas/fluxoModel.php';

class fluxoController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new fluxoModel();      
    }

    public function index(){

        $instModel = new fluxoModel();
        $dados = $instModel->listar(); 
        $this->carregarTemplate('financas/fluxo_caixa', array(), $dados);   
          
    }
    public function novo(){
        $instModel = new fluxoModel();
        $dados = $instModel->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('financas/fluxo_caixa', $instModel, $dados); 

        }             
    }

    public function buscar(){

        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('financas/fluxo_caixa', $instModel);  
       
           
    }

    public function cadViatura()
    {                  
        $this->carregarTemplate('financas/fluxo_caixa');
    }
    public function cadastrar(){
        
        $inst_Model = new fluxoModel();
        $inst_Model->id_mov = $_POST['txtIdMov'];
        $inst_Model->data_reg = $_POST['data_reg'];
        $inst_Model->categoria = $_POST['cmbCategoria'];
        $inst_Model->tipo = $_POST['txtTipo'];
        $inst_Model->valor = $_POST['txtValor'];
        $inst_Model->observacao = $_POST['txtObs'];
        $estado = $inst_Model->id_mov > 0 ? $this->Model->editar($inst_Model) :  $this->Model->registar($inst_Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_mov > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('financas/fluxo_caixa', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('financas/fluxo_caixa', $aviso, $dados);
            }    
        }
        else{
            $aviso[0] = 'Não foi possivel salvar este registo';
            $this->carregarTemplate('financas/fluxo_caixa', $aviso, $dados);
        }

    }

    public function eliminar(){

        $viatModel = new fluxoModel();
        $estado = $viatModel->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('financas/fluxo_caixa', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('financas/fluxo_caixa', $aviso, $dados);

        };
    }
   
}