<?php

if(!isset($_SESSION))
session_start();

class minModel{

    public $Con;

    public $id_min;
    public $nome;
    public $descricao;
    public $lider;

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
            mi.id_min,
            mi.nome,
            mi.descricao,
            mi.lider,
            COUNT(m.id_mem) as total
            FROM membros_min mm
            RIGHT join ministerios mi on mi.id_min=mm.id_min
            LEFT join membros m on m.id_mem=mm.id_mem
            GROUP by mi.id_min
            Order by mi.nome asc";

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
            mi.id_mem,
            mi.nome,
            mi.descricao,
            mi.lider,
            COUNT(m.id_mem) as total
            FROM membros_min mm
            RIGHT join ministerios mi on mi.id_min=mm.id_min
            LEFT join membros m on m.id_mem=mm.id_mem
            WHERE mi.nome Like '%$texto%' 
            OR mi.descricao Like '%$texto%'
            OR mi.lider Like '%$texto%'        
            GROUP by mi.id_min
            order by total desc ";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarID($id){

        try {
            $query = "SELECT * FROM ministerios WHERE id_min=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(minModel $dados){

        $query = "SELECT * FROM ministerios WHERE nome=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->nome));

        if($smt->rowCount() == 0){
            
            try {
                $query = "INSERT INTO ministerios (nome, descricao, lider) 
                VALUES(?,?,?)";
        
                $this->Con->prepare($query)->execute(array($dados->nome, $dados->descricao, 
                $dados->lider)); 
        
            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;

        }
        else{
            return false;
        }
       
    }
    public function editar(minModel $dados){

        try {
            $query = "UPDATE  ministerios SET nome=?, descricao=?, lider=? where id_min=?";

            $this->Con->prepare($query)->execute(array($dados->nome, $dados->descricao, 
            $dados->lider, $dados->id_min)); 

            return true;

        } catch (Exception $e){
            
            return false;
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM ministerios WHERE id_min =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));

            return true;
            
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>