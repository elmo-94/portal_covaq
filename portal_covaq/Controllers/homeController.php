<?php
class homeController extends Controller{

    public $Model;
    public $logModel;

    public  $usuario;
    public  $senha;

    public function __construct(){

        $this->Model= new estatisticasModel();   
        $this->logModel = new loginModel();
              
    }

    public function index(){
      
        $this->carregarTemplate('include/portal_covaq', array());   
    }


    public function painel(){
                
        $dadosLogin = $this->logModel->login($this->usuario, $this->senha);
        $dados = $this->Model->estatisticas_administractiva(); 
        $this->carregarTemplate('include/painel', $dados, $dadosLogin);   
    }
    

    public function login(){
    
        $dadosLogin = $this->logModel->login($_POST['email'], $_POST['senha']);
       
            if(!empty($dadosLogin)){              

                if(!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['id_user'] = $dadosLogin->id_user;
                $_SESSION['usuario'] = $dadosLogin->usuario;
                $_SESSION['email'] = $dadosLogin->email;
                $_SESSION['nivel'] = $dadosLogin->nivel;
                $_SESSION['senha'] = $dadosLogin->senha;
              
                $dados = $this->Model->estatisticas_administractiva(); 
                $this->carregarTemplate('include/painel', $dados, $dadosLogin);
                
            }
            else{
                $this->index();
                $_SESSION['erro'] = "Usuário ou senha incorrecto";
            }
               
    }
}