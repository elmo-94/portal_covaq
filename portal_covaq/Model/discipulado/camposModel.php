<?php

class camposModel{

    public $Con;

    public $id_camp;
    public $localidade;
    public $data_fund;
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
            $query = "SELECT cm.id_camp, cm.localidade, cm.data_fund, m.nome
            from campo_misscionarios cm
            inner join membros m on m.id_mem=cm.id_mem 
            order by cm.id_camp DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT cm.id_camp, cm.localidade, cm.data_fund, m.nome
            from campo_misscionarios cm
            inner join membros m on m.id_mem=cm.id_mem 

            WHERE cm.localidade Like '%$texto%' OR m.nome Like'%$texto%'
            OR m.nome Like '%$texto%' 
            OR cm.localidade Like '%$texto%'       
            OR cm.data_func Like '%$texto%'           
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();
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
            $query = "SELECT * FROM campo_misscionarios WHERE id_camp=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(camposModel $dados){
    
        try {
            $query = "INSERT INTO campo_misscionarios (localidade, data_fund, id_mem) 
            VALUES(?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->localidade, 
            $dados->data_fund, $dados->id_mem));
            

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function editar(camposModel $dados){

        try {
            $query = "UPDATE  campo_misscionarios SET localidade=?, data_fund=?, id_mem=? WHERE id_camp=? ";

            $this->Con->prepare($query)->execute(array($dados->localidade, 
            $dados->data_fund, $dados->id_mem, $dados->id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }


    public function delete($id){

        try {
            $query = "DELETE FROM campo_misscionarios WHERE id_camp =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}

?>