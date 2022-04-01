<?php

class saidasModel{

    public $Con;

    public $id_saida;
    public $data_reg;
    public $destino;
    public $ncessidade;
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
            $query = "SELECT * FROM saidas ORDER BY id_saida DESC ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * FROM saidas where destino like '%$texto%'";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarID($id){

        try {
            $query = "SELECT * FROM saidas WHERE id_saida=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(saidasModel $dados){
        try {
            $query = "INSERT INTO saidas (data_reg, destino, necessidade, valor, observacao) 
            VALUES(?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->destino, $dados->necessidade, 
            $dados->valor, $dados->observacao)); 

            $this->registar_Movimentacao($dados->data_reg, 'Despesa', 'Outas despesas', $dados->valor);

        } catch (Exception $e){
            die("[ERRO]  ".$e->getMessage());
        }
    }
    public function editar(saidasModel $dados){

        try {
            $query = "UPDATE  saidas SET data_reg=?, destino=?,
             necessidade=?, valor=?, observacao=? where id_saida=?";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->destino, $dados->necessidade, 
            $dados->valor, $dados->observacao, $dados->id_saida)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id){      
        try {
            $query = "DELETE FROM saidas WHERE id_saida=?";
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