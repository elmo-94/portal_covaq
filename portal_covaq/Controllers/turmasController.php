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
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/turmas_disc', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_REQUEST['texto'])){
           
            $instModel = $this->Model->buscar($_REQUEST['texto']);
        }
        $this->carregarTemplate('discipulado/turmas_disc', $instModel);
           
    }

    public function cadastrar(){
              
        $this->Model->id_turma = $_POST['id_turma'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->id_prof = $_POST['id_prof'];
        $this->Model->id_aluno = $_POST['id_aluno'];
        $this->Model->fase = $_POST['fase'];
        $this->Model->consagracao = $_POST['consagracao'];
        $this->Model->estado = $_POST['estado'];
        $this->Model->id_turma > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $this->index();

    }

    public function eliminar(){
        $this->Model->delete($_REQUEST['cod']);
        $this->index();
    }
   
}