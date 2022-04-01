<?php

class minModel{

    public $Con;

    public $id_min;
    public $nome;
    public $descricao;
    public $lider;

    public function __construct(){

        try {
            $this->Con = conexao::conectar();
            $this->listar();
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listar(){

        try {
            $query = "SELECT * FROM ministerios
            ORDER BY id_min DESC ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * FROM ministerios e 

            WHERE nome Like '%$texto%' 
            OR descricao Like '%$texto%'
            OR lider Like '%$texto%'        
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarID($id){

        try {
            $query = "SELECT * FROM ministerios WHERE id_min=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(minModel $dados){

        try {
            $query = "INSERT INTO ministerios (nome, descricao, lider) 
            VALUES(?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->nome, $dados->descricao, 
            $dados->lider)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function editar(minModel $dados){

        try {
            $query = "UPDATE  ministerios SET nome=?, descricao=?, lider=? where id_min=?";

            $this->Con->prepare($query)->execute(array($dados->nome, $dados->descricao, 
            $dados->lider, $dados->id_min)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM ministerios WHERE id_min =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}

?>