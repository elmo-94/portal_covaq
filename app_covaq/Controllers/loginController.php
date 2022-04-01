<?php

class loginController extends Controller{

    public $Model;
    public  $viatModel;
    public $logModel;
    public function __construct(){

        $this->Model= new estatisticasModel();   
        $this->logModel = new loginModel();
              
    }

    public function index(){
      
        $this->carregarTemplate('include/login', array());   
    }
    public function dashboard(){

        $this->carregarTemplate('include/painel', array());   
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
            }
               
    }
}