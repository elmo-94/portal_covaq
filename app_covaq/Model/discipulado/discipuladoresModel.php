<?php

class discipuladoresModel{

    public $Con;

    public $id_discip;
    public $data_reg;
    public $localidade;
    public $id_mem;
    public $estado;
    public $fase;

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
            d.fase,
            d.estado
            FROM discipuladores d
            inner join membros m on m.id_mem=d.id_mem
            order by m.nome asc";

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
            d.fase as fase,
            d.localidade,
            d.estado as estado
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
            $query = "SELECT * FROM membros ORDER BY nome asc";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
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

    public function registar(discipuladoresModel $dados){


        $query = "SELECT * FROM discipuladores WHERE id_mem=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->id_mem));

        if($smt->rowCount() == 0){

            try {
                $query = "INSERT INTO discipuladores (localidade, fase, id_mem, estado) 
                VALUES(?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->localidade, 
                $dados->fase, $dados->id_mem, $dados->estado));
                

            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;
        }else{
            return false;
        }
    }
    public function editar(discipuladoresModel $dados){

        try {
            $query = "UPDATE  discipuladores SET localidade=?, fase=? estado=? WHERE id_discip=? AND id_mem=$dados->id_mem ";

            $this->Con->prepare($query)->execute(array($dados->localidade, $dados->fase, $dados->estado, $dados->id_discip)); 
            return true;
        } catch (Exception $e){
            //return false;
            $e.message();
        }
    }


    public function delete($id){

        try {
            $query = "DELETE FROM discipuladores WHERE id_discip =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>