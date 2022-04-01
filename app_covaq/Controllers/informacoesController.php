<?php
include_once 'Model/admin/informacoesModel.php';

class informacoesController extends Controller{
    
    public $Model;
    public  $instModel;

    public function __construct(){

        $this->Model= new informacoesModel();        
    }

    public function index(){

        $dados = $this->Model->listar(); 
        $this->carregarTemplate('admin/informacoes', array(), $dados);   
          
    }
    public function novo(){

        $dados = $this->Model->listar(); 

        if(isset($_REQUEST['id'])){
            $instModel = $this->Model->carregarID($_REQUEST['id']);      
            $this->carregarTemplate('admin/informacoes', $instModel, $dados); 

        }             
    }

    public function buscar(){
        if(isset($_POST['texto'])){
           
            $instModel = $this->Model->buscar($_POST['texto']);
        }
        $this->carregarTemplate('admin/informacoes', $instModel);
           
    }

    public function cadastrar(){
        $this->Model->id_info = $_POST['id_info'];
        $this->Model->descricao = $_POST['descricao'];
        $this->Model->realizacao = $_POST['realizacao'];
        $this->Model->data_inicio = $_POST['data_inicio'];
        $this->Model->data_fim = $_POST['data_fim'];
        $this->Model->local_info = $_POST['local_info'];
        $this->Model->duracao = $_POST['duracao'];
        $this->Model->destino = $_POST['destino'];
        $estado = $this->Model->id_info > 0 ? $this->Model->editar($this->Model) :  $this->Model->registar( $this->Model);
        
        $aviso=array();
        $dados = $this->Model->listar(); 
        if($estado == true){
        $dados = $this->Model->listar(); 

            if($this->Model->id_info > 0 ){

                $aviso[1] = 'Alteração efectuada com sucesso !';
                $this->carregarTemplate('admin/informacoes', $aviso, $dados);

            }else{
                $aviso[1] = 'Cadastro efectuado com sucesso !';
                $this->carregarTemplate('admin/informacoes', $aviso, $dados);
            }    
        }
        else{
            $aviso[0] = 'Não foi possivel salvar este registo';
            $this->carregarTemplate('admin/informacoes', $aviso, $dados);
        }

    }

    public function eliminar(){
        $estado = $this->Model->delete($_REQUEST['cod']);
        $aviso=array();
        if($estado == true){
           
            $dados = $this->Model->listar(); 
            $aviso[1] = 'Registo eliminado com sucesso !';
            $this->carregarTemplate('admin/informacoes', $aviso, $dados);

        }else{
            $dados = $this->Model->listar(); 
            $aviso[0] = 'Não é possivel eliminar este registo';
            $this->carregarTemplate('admin/informacoes', $aviso, $dados);

        };
    }
   
}