<?php

class turma_discModel{

    public $Con;

    public $id_turma;
    public $data_reg;
    public $id_prof;
    public $id_aluno;
    public $fase;
    public $consagracao;
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
            t.id_turma,
            t.data_reg,
            nc.nome as aluno,
            t.fase,
            t.consagracao,
            t.estado,
            m.nome as professor
            from turma_discipulado t
            inner join novos_convertidos nc on nc.id_nc=t.id_aluno
            inner join membros m on m.id_mem=t.id_prof
            order by t.id_turma DESC";

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
            t.id_turma,
            t.data_reg,
            nc.nome as aluno,
            t.fase,
            t.consagracao,
            t.estado,
            m.nome as professor
            from turma_discipulado t
            inner join novos_convertidos nc on nc.id_nc=t.id_aluno
            inner join membros m on m.id_mem=t.id_prof
            WHERE m.nome Like '%$texto%'
            OR nc.nome Like '%$texto%'
            OR m.nome Like '%$texto%'                     
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function listar_membros_disc(){

        try {
            $query = "SELECT
            m.id_mem,
            m.ident,
            m.nome,
            m.telefone,
            md.fase,
            md.consagracao,
            md.estado
            from membros_discipulo md
            inner join membros m on m.id_mem=md.id_aluno           
            ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar_membros_disc($texto){
        try {
            $query = "SELECT
            m.id_mem,
            m.ident,
            m.nome,
            m.telefone,
            md.fase,
            md.consagracao,
            md.estado,
            (select m.nome from membros_discipulo md 
             inner join discipuladores d on d.id_discip=md.id_prof
             inner join membros m on m.id_mem=d.id_mem) as professor
            from membros_discipulo md
            inner join membros m on m.id_mem=md.id_aluno

            WHERE m.nome Like '%$texto%'
            OR m.nome Like '%$texto%'
            OR m.ident Like '%$texto%'
            OR md.fase Like '%$texto%'    
            OR md.estado Like '%$texto%'
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
            $query = "SELECT * FROM turma_discipulado WHERE id_turma=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarDiscipuladores(){

        try {
            $query = "SELECT
            d.id_discip,
            m.nome,
            m.ident,
            d.localidade,
            d.estado
            from discipuladores d 
            inner join membros m on m.id_mem=d.id_mem
            where d.estado = 'Regular'";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarConvertidos(){

        try {
            $query = "SELECT * FROM novos_convertidos ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(turma_discModel $dados){

        $query = "SELECT * FROM turma_discipulado WHERE id_aluno=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->id_aluno));

        if($smt->rowCount() == 0){

            try {
                $query = "INSERT INTO turma_discipulado (data_reg, id_prof, id_aluno, fase, consagracao, estado) 
                VALUES(?,?,?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->id_prof, $dados->id_aluno, 
                $dados->fase, $dados->consagracao, $dados->estado));
                

            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;
        }else{
            return false;
        }
    }
    public function editar(turma_discModel $dados){

        try {
            $query = "UPDATE  turma_discipulado SET data_reg=?, id_prof=?, id_aluno=?, fase=?, consagracao=?, estado=? where id_turma=?";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->id_prof, $dados->id_aluno, 
            $dados->fase, $dados->consagracao, $dados->estado, $dados->id_turma));
            return true;
        } catch (Exception $e){
            return false;
        }
    }


    public function delete($id){

        try {
            $query = "DELETE FROM turma_discipulado WHERE id_turma=?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>