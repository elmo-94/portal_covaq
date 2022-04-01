<?php

class fluxoModel{

    public $Con;

    public $id_mov;
    public $data;
    public $categoria;
    public $tipo;
    public $valor;
    public $observacao;



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
            $query = "SELECT * FROM movimentacoes ORDER BY id_mov DESC";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * FROM movimentacoes
            WHERE data_reg Like '%$texto%'
            OR categoria Like'%$texto%'
            OR tipo Like '%$texto%'";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarCategorias(){

        try {
            $query = "SELECT * FROM categorias";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarTipos(){

        try {
            $query = "SELECT * FROM tipos";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarID($id){

        try {
            $query = "SELECT * FROM movimentacoes WHERE id_mov=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(fluxoModel $dados){

        try {
            $query = "INSERT INTO movimentacoes (data_reg, categoria, tipo, valor, observacao)VALUES(?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->categoria, $dados->tipo, 
            $dados->valor, $dados->observacao)); 
            return true;
        } catch (Exception $e){
            return false;
        }
    }
    public function editar(fluxoModel $dados){

        try {
            $query = "UPDATE  movimentacoes SET data_reg=?, categoria=?, tipo=?, valor=?, observacao=? WHERE id_mov=? ";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->categoria, $dados->tipo, 
            $dados->valor, $dados->observacao, $dados->id_mov)); 
            return false;
        } catch (Exception $e){
            return false;
        }
    }

    public function delete($id){
        try {
            $query = "DELETE FROM movimentacoes WHERE id_mov =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>