<?php

class obrasModel{

    public $Con;

    public $id_obra;
    public $descricao;
    public $localidade;
    public $data_inicio;
    public $data_fim;
    public $financiador;
    public $orcamento;
    public $estado;

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
            $query = "SELECT * FROM obras
            ORDER BY id_obra DESC ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * FROM obras
            WHERE localidade Like '%$texto%' 
            OR descricao Like '%$texto%'
            OR estado Like '%$texto%'        
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
            $query = "SELECT * FROM obras WHERE id_obra=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(obrasModel $dados){

        try {
            $query = "INSERT INTO obras (descricao, localidade, data_inicio, data_fim, financiador,
            orcamento, estado) 
            VALUES(?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->descricao, $dados->localidade, 
            $dados->data_inicio, $dados->data_fim, $dados->financiador, $dados->orcamento, $dados->estado)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function editar(obrasModel $dados){

        try {
            $query = "UPDATE  obras SET descricao=?, localidade=?, data_inicio=?, data_fim=?, financiador=?,
            orcamento=?, estado=?
             where id_obra=?";

            $this->Con->prepare($query)->execute(array($dados->descricao, $dados->localidade, 
            $dados->data_inicio, $dados->data_fim, $dados->financiador, $dados->orcamento, $dados->estado, $dados->id_obra)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM obras WHERE id_obra =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}

?>