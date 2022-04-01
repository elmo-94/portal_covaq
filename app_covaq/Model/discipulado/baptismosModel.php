<?php

class baptismosModel{

    public $Con;

    public $id_bap;
    public $data_reg;
    public $pastor;
    public $localidade;
    public $total;

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
            $query = "SELECT *
            FROM baptismos           
            ORDER BY id_bap DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT *
            FROM baptismos        
            WHERE data_reg Like '%$texto%' 
            OR pastor Like'%$texto%'
            OR localidade Like '%$texto%'
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarConvertidos(){

        try {
            $query = "SELECT * FROM novos_convertidos";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarID($id){

        try {
            $query = "SELECT * FROM baptismos WHERE id_bap=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarCampos(){

        try {
            $query = "SELECT * FROM campo_missionarios ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(baptismosModel $dados){

        $query = "SELECT * FROM baptismos WHERE data_reg=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->data_reg));

        if($smt->rowCount() == 0){

            try {
                $query = "INSERT INTO baptismos (data_reg, pastor, localidade, total) 
                VALUES(?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->data_reg, 
                $dados->pastor, $dados->localidade, $dados->total));
                

            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;
        }else{
            return false;
        }
    }

    public function editar(baptismosModel $dados){

        try {
            $query = "UPDATE  baptismos SET data_reg=?, pastor=?, localidade=?, total=? WHERE id_bap=? ";
            $this->Con->prepare($query)->execute(array($dados->data_reg, 
            $dados->pastor, $dados->localidade, $dados->total, $dados->id_bap)); 
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    public function altar_estado_convertidos($estado, $id_nc){

        try {
            $query = "UPDATE  novos_convertidos SET estado=?,
             WHERE id_nc=? ";

            $this->Con->prepare($query)->execute(array($estado, $id_nc)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM baptismos WHERE id_bap =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>