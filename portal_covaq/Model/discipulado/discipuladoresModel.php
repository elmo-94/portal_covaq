<?php

class discipuladoresModel{

    public $Con;

    public $id_discip;
    public $data_reg;
    public $localidade;
    public $id_mem;
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
            $query = "SELECT
            d.id_discip,
            d.data_reg,
            m.nome,
            m.genero,
            m.telefone,
            d.localidade,
            d.estado
            FROM discipuladores d
            inner join membros m on m.id_mem=d.id_mem
            order by id_discip DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT
            d.id_discip,
            d.data_reg,
            m.nome,
            m.genero,
            m.telefone,
            d.localidade,
            d.estado
            FROM discipuladores d
            inner join membros m on m.id_mem=d.id_mem
            WHERE m.nome Like '%$texto%'
            OR m.genero Like '%$texto%' 
            OR d.estado Like '%$texto%'  
            OR d.localidade Like '%$texto%'                   
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
            $query = "SELECT * FROM discipuladores WHERE id_discip=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarMembros(){

        try {
            $query = "SELECT * FROM membros ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarCampos(){

        try {
            $query = "SELECT * FROM campo_misscionarios ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(discipuladoresModel $dados){

        try {
            $query = "INSERT INTO discipuladores (data_reg, id_mem, localidade, estado) 
            VALUES(?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->data_reg, 
            $dados->id_mem, $dados->localidade, $dados->estado));
            

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function editar(discipuladoresModel $dados){

        try {
            $query = "UPDATE  discipuladores SET localidade=?, estado=? WHERE id_discip=? ";

            $this->Con->prepare($query)->execute(array($dados->localidade, $dados->estado, $dados->id_discip)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }


    public function delete($id){

        try {
            $query = "DELETE FROM discipuladores WHERE id_discip =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}

?>