<?php

include_once 'Model/discipulado/baptismosModel.php';

class baptismoController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new baptismosModel();      
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('discipulado/baptismos', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('discipulado/baptismos', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('discipulado/baptismos',array(), $instModel);
           
    }

    public function cad_baptismo(){
        //$dados = $this->Model->carregarCampos();
        $this->carregarTemplate('discipulado/cad_baptismo', array());
    }
    public function cadastrar(){ 

        $this->Model->id_bap = $_POST['id_bap'];
        $this->Model->data_reg = $_POST['data_reg'];
        $this->Model->pastor = $_POST['pastor'];
        $this->Model->localidade = $_POST['localidade'];
        $this->Model->total = $_POST['total'];

        $estado = $this->Model->id_bap > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_bap > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('discipulado/cad_baptismo', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('discipulado/cad_baptismo', $aviso, $dados);
            }
                
        }
        else{
           
            $aviso[0] = 'Este ministério já existe';
            $this->carregarTemplate('discipulado/cad_baptismo', $aviso, $dados);
        }

    }

    public function eliminar(){
        $aviso=array();
        $estado = $this->Model->delete($_REQUEST['cod']);
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('discipulado/cad_baptismo', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não foi possivel eliminar este registo';
            $this->carregarTemplate('discipulado/cad_baptismo', $aviso, $dados);

        }
    }
   
}