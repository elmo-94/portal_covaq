<?php

include_once 'Model/discipulado/turma_discModel.php';

class turmasController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model = new turma_discModel();       
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('discipulado/turmas_disc', array(), $dados);   
          
    }
    public function listar_membros_disc(){

        $dados = $this->Model->listar_membros_disc(); 
        $this->carregarTemplate('discipulado/membros_disc', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/turmas_disc', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('discipulado/turmas_disc', $instModel);
           
    }
    public function buscar_membros_disc(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar_membros_disc($_POST['texto']);
        }
        $this->carregarTemplate('discipulado/membros_disc', $instModel);
           
    }

    public function cadastrar(){
              
        $this->Model->id_turma = $_POST['id_turma'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->id_prof = $_POST['id_prof'];
        $this->Model->id_aluno = $_POST['id_aluno'];
        $this->Model->fase = $_POST['fase'];
        $this->Model->consagracao = $_POST['consagracao'];
        $this->Model->estado = $_POST['estado'];
        $estado = $this->Model->id_turma > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_turma > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('discipulado/turmas_disc', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('discipulado/turmas_disc', $aviso, $dados);
            }    
        }
        else{
           
            $aviso[0] = 'Este ministério já existe';
            $this->carregarTemplate('discipulado/turmas_disc', $aviso, $dados);
        }

    }

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('discipulado/turmas_disc', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('discipulado/turmas_disc', $aviso, $dados);

        }
    }
   
}