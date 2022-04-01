<?php

class loginModel{

    public $Con;

    public $usuario;
    public $email;
    public $senha;

    public function __construct(){

        try {
            $this->Con = conexao::conectar();
            //$this->login();
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function login($usuario, $senha){

        try {
            $query = "SELECT * FROM usuarios WHERE email = '$usuario' AND senha = '$senha' 
            OR usuario = '$usuario' AND senha = '$senha'";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetch(PDO::FETCH_OBJ);

        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}