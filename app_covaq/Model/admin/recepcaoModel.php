<?php

class recepcaoModel{

    public $Con;

    public $id_recep;
    public $data_reg;
    public $nome;
    public $genero;
    public $origem;
    public $localidade;
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
            $query = "SELECT * from receber_membros order by id_recep DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * from receber_membros
            WHERE localidade Like '%$texto%' 
            OR nome Like'%$texto%'
            OR genero Like '%$texto%' 
            OR origem Like '%$texto%'
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
            $query = "SELECT * FROM receber_membros WHERE id_recep=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(recepcaoModel $dados){

        $query = "SELECT * FROM receber_membros WHERE nome=?";

        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->nome));

        if($smt->rowCount() == 0){

            try {
                $query = "INSERT INTO receber_membros (data_reg, nome, genero, origem, localidade, estado) 
                VALUES(?,?,?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->nome, $dados->genero, $dados->origem, $dados->localidade, $dados->estado));
                
            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;
        }else{
            return false;
        }
    }
    public function editar(recepcaoModel $dados){

        try {
            $query = "UPDATE  receber_membros SET data_reg=?, nome=?, genero=?, origem=?, localidade=?, estado=? WHERE id_recep=? ";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->nome, $dados->genero, $dados->origem, $dados->localidade, $dados->estado, $dados->id_recep)); 
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM receber_membros WHERE id_recep =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>