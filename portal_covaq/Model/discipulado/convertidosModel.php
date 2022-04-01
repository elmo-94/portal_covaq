<?php

class convertidosModel{

    public $Con;

    public $id_nc;
    public $data_reg;
    public $nome;
    public $identificacao;
    public $genero;
    public $data_nasc;
    public $naturalidade;
    public $morada;
    public $telefone;
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
            $query = "SELECT  * from novos_convertidos
            ORDER BY id_nc DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT  * from novos_convertidos

            WHERE nome Like '%$texto%' OR identificacao Like'%$texto%'
            OR genero Like '%$texto%' 
            OR estado Like '%$texto%'
            OR morada Like '%$texto%'                     
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    

    public function carregarID($id){

        try {
            $query = "SELECT * FROM novos_convertidos WHERE id_nc=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(convertidosModel $dados){

        try {
            $query = "INSERT INTO novos_convertidos (data_reg, nome, identificacao, 
            genero, data_nasc, naturalidade, morada, telefone, estado) 
            VALUES(?,?,?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->data_reg, 
            $dados->nome, $dados->identificacao, $dados->genero, 
            $dados->data_nasc, $dados->naturalidade, $dados->morada, 
            $dados->telefone, $dados->estado));
            

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function editar(convertidosModel $dados){

        try {
            $query = "UPDATE  novos_convertidos SET data_reg=?, nome=?, identificacao=?, 
            genero=?, data_nasc=?, naturalidade=?, morada=?, telefone=?, estado=? WHERE id_nc=? ";

            $this->Con->prepare($query)->execute(array($dados->data_reg, 
            $dados->nome, $dados->identificacao, $dados->genero, 
            $dados->data_nasc, $dados->naturalidade, $dados->morada, 
            $dados->telefone, $dados->estado, $dados->id_nc)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }


    public function delete($id){

        try {
            $query = "DELETE FROM novos_convertidos WHERE id_nc =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}

?>