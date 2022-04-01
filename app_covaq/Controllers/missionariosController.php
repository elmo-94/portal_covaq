<?php

include_once 'Model/discipulado/missionariosModel.php';

class missionariosController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new missionariosModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('discipulado/missionarios', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/missionarios', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('discipulado/missionarios', $instModel);
           
    }


    public function cadastrar(){ 

        $this->Model->id_miss = $_POST['id_miss'];
        $this->Model->data_consag = $_POST['data_consag'];
        $this->Model->id_mem = $_POST['id_mem'];
        $this->Model->id_campo_miss = $_POST['id_campo_miss'];
    
        $estado = $this->Model->id_miss > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_miss > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('discipulado/missionarios', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('discipulado/missionarios', $aviso, $dados);
            }
                
        }
        else{
           
            $aviso[0] = 'Este ministério já existe';
            $this->carregarTemplate('discipulado/missionarios', $aviso, $dados);
        }

    }

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('discipulado/missionarios', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('discipulado/missionarios', $aviso, $dados);

        }
    }
   
}