<?php

include_once 'Model/discipulado/camposModel.php';

class camposController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new camposModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('discipulado/campos', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/campos', $instModel, $dados); 

        }             
    }

    public function buscar(){
        
        if(isset($_POST['texto'])){          
            $instModel = $this->Model->buscar($_POST['texto']);
            
        }
        $this->carregarTemplate('discipulado/campos', $instModel);
           
    }


    public function cadastrar(){ 

        $this->Model->id_camp = $_POST['id_camp'];
        $this->Model->localidade = $_POST['localidade'];
        $this->Model->data_fund = $_POST['data_fund'];
        //$this->Model->id_mem = $_POST['id_mem'];
    
        $estado = $this->Model->id_camp > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_camp > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('discipulado/campos', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('discipulado/campos', $aviso, $dados);
            }
                
        }
        else{
           
            $aviso[0] = 'Não foi possivel salvar este registo';
            $this->carregarTemplate('discipulado/campos', $aviso, $dados);
        }

    }

    public function eliminar(){
        $aviso=array();
        $estado = $this->Model->delete($_REQUEST['cod']);
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('discipulado/campos', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('discipulado/campos', $aviso, $dados);

        };
    }
   
}