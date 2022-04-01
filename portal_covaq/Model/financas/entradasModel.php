<?php

class entradasModel{

    public $Con;

    public $id_ent;
    public $data_reg;
    public $tipo;
    public $doador;
    public $valor;
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
            $query = "SELECT * FROM entradas
            ORDER BY id_ent DESC ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * FROM entradas e 

            WHERE e.data_reg Like '%$texto%' 
            OR e.tipo Like '%$texto%'
            OR e.doador Like '%$texto%'
            OR e.estado Like '%$texto%'          
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
            $query = "SELECT * FROM entradas WHERE id_ent=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(entradasModel $dados){

        try {
            $query = "INSERT INTO entradas (data_reg, tipo, doador, valor, estado) 
            VALUES(?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->tipo, 
            $dados->doador, $dados->valor, $dados->estado)); 

            $this->registar_Movimentacao($dados->data_reg, 'Receita', 'Outras receitas', $dados->valor);

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function editar(entradasModel $dados){

        try {
            $query = "UPDATE  entradas SET data_reg=?, tipo=?, doador=?, valor=?, estado=? where id_ent=?";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->tipo, 
            $dados->doador, $dados->valor, $dados->estado, $dados->id_ent)); 
           
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM entradas WHERE id_ent =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar_Movimentacao($data_reg, $categoria, $tipo, $valor){

        try {
            $query = "INSERT INTO movimentacoes (data_reg,categoria,tipo,valor)VALUES(?,?,?,?)";

            $this->Con->prepare($query)->execute(array($data_reg, $categoria, $tipo, $valor)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
}

?>