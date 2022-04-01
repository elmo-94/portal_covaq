<?php

class informacoesModel{

    public $Con;

    public $id_info;
    public $descricao;
    public $realizacao;
    public $data_inicio;
    public $data_fim;
    public $local_info;
    public $duracao;
    public $destino;


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
            $query = "SELECT * from informacoes";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * from informacoes
            WHERE descricao Like '%$texto%' 
            OR local_info Like'%$texto%'
            OR destino Like '%$texto%' 
            OR realizacao Like '%$texto%'
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
            $query = "SELECT * FROM informacoes WHERE id_info=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(informacoesModel $dados){

        try {
            $query = "INSERT INTO informacoes (descricao, data_inicio, data_fim, local_info, duracao, destino, realizacao) 
            VALUES(?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->descricao,$dados-> data_inicio, $dados->data_fim, $dados->local_info, $dados->duracao, $dados->destino, $dados->realizacao));
            return true;
        } catch (Exception $e){
            return false;
        }
    }
    public function editar(informacoesModel $dados){

        try {
            $query = "UPDATE  informacoes SET descricao=?, data_inicio=?, data_fim=?, local_info=?, duracao=?, destino=?, realizacao=? WHERE id_info=? ";

            $this->Con->prepare($query)->execute(array($dados->descricao, $dados->data_inicio, $dados->data_fim, $dados->local_info, $dados->duracao, $dados->destino, $dados->realizacao, $dados->id_info)); 
            return true;
        } catch (Exception $e){
            return false;
        }
    }



    public function delete($id){

        try {
            $query = "DELETE FROM informacoes WHERE id_info =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }

    public function ultimas_informacoes(){

        try {
            $query = "SELECT * FROM informacoes order by id_info desc LIMIT 7";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}

?>