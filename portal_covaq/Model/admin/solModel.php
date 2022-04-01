<?php

class solModel{

    public $Con;

    public $id_sol;
    public $data_reg;
    public $num_oficio;
    public $estado;
    public $id_tipodoc;
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
            $query = "SELECT s.id_sol, s.data_reg, s.num_oficio, m.nome, m.ident, t.tipodoc, s.estado 
            FROM solicitacoes s
            INNER JOIN membros m on m.id_mem=s.id_mem
            INNER JOIN tipo_doc t on t.id_tipodoc=s.id_tipodoc
            ORDER BY id_sol DESC ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT s.id_sol, s.data_reg, s.num_oficio, m.nome, m.ident, t.tipodoc, s.estado 
            FROM solicitacoes s
            INNER JOIN membros m on m.id_mem=s.id_mem
            INNER JOIN tipo_doc t on t.id_tipodoc=s.id_tipodoc
            WHERE s.data_reg Like '%$texto%' 
            OR s.num_oficio Like '%$texto%'
            OR m.nome Like '%$texto%'
            OR m.ident Like '%$texto%' 
            OR t.tipodoc Like '%$texto%' 
            OR s.estado Like '%$texto%'      
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
            $query = "SELECT * FROM solicitacoes WHERE id_sol=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
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
    public function carregarTipoDoc(){

        try {
            $query = "SELECT * FROM tipo_doc";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function registar(solModel $dados){

        try {
            $query = "INSERT INTO solicitacoes (data_reg, num_oficio, estado,id_tipodoc, id_mem) 
            VALUES(?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->num_oficio, 
             $dados->estado, $dados->id_tipodoc, $dados->id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function editar(solModel $dados){

        try {
            $query = "UPDATE  solicitacoes SET data_reg=?, num_oficio=?, estado=?, id_tipodoc=?, id_mem=? where id_min=?";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->num_oficio, 
            $dados->estado, $dados->id_tipodoc, $dados->id_mem, $dados->id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM solicitacoes WHERE id_sol =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
}

?>