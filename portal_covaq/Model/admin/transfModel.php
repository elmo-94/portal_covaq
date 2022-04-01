<?php

class transfModel{

    public $Con;

    public $id_transf;
    public $data_reg;
    public $destino;
    public $motivo;
    public $localidade;
    public $estado;
    public $id_mem;

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
            $query = "SELECT t.id_transf, m.id_mem, 
            t.data_reg,  m.ident, m.nome,t.motivo, 
            t.destino, t.localidade, t.estado
            FROM transf_membros t
            INNER JOIN membros m on m.id_mem=t.id_mem
            
            ORDER BY id_transf DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT t.id_transf, m.id_mem, t.data_reg, m.ident, m.nome,t.motivo, 
            t.destino, t.localidade, t.estado
            FROM transf_membros t
            INNER JOIN membros m on m.id_mem=t.id_mem
            
            ORDER BY id_transf DESC        
            WHERE t.data_reg Like '%$texto%' OR m.ident Like'%$texto%'
            OR m.nome Like '%$texto%' 
            OR t.motivo Like '%$texto%'
            OR t.estado Like '%$texto%'
            OR t.destino Like '%$texto%'
            OR t.localidade Like '%$texto%'          
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarMembros(){

        try {
            $query = "SELECT * FROM membros";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarID($id){

        try {
            $query = "SELECT * FROM transf_membros WHERE id_transf=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(transfModel $dados){

        try {
            $query = "INSERT INTO transf_membros (data_reg, motivo, destino, localidade, 
            estado, id_mem) 
            VALUES(?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->data_reg, 
            $dados->motivo, $dados->destino, $dados->localidade, $dados->estado, $dados->id_mem));
            
            $this->altar_estado_membro('Transferido', $dados->id_mem);

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function editar(transfModel $dados){

        try {
            $query = "UPDATE  transf_membros SET data_reg=?, motivo=?, destino=?, localidade=?, 
            estado=?, id_mem=? WHERE id_transf=? ";

            $this->Con->prepare($query)->execute(array($dados->data_reg, 
            $dados->motivo, $dados->destino, $dados->localidade, $dados->estado, $dados->id_mem, $dados->id_transf)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function altar_estado_membro($estado, $id_mem){

        try {
            $query = "UPDATE  membros SET estado=?,
             WHERE id_mem=? ";

            $this->Con->prepare($query)->execute(array($estado, $id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM dizimos WHERE id_diz =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}

?>