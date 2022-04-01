<?php

class missionariosModel{

    public $Con;

    public $id_miss;
    public $data_fund;
    public $id_mem;
    public $id_campo_miss;

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
            mis.id_miss,
            m.nome,
            mis.data_consag,
            cm.localidade as campo           
            from membros_campos mc
            LEFT join campo_missionarios cm on cm.id_camp=mc.id_camp
            right join membros m on m.id_mem=mc.id_mem 
            right join missionarios mis on mis.id_mem=m.id_mem";

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
            mis.id_miss,
            m.nome,
            mis.data_consag,
            cm.localidade as campo           
            from membros_campos mc
            LEFT join campo_missionarios cm on cm.id_camp=mc.id_camp
            right join membros m on m.id_mem=mc.id_mem 
            right join missionarios mis on mis.id_mem=m.id_mem 

            WHERE cm.localidade Like '%$texto%' 
            OR m.nome Like'%$texto%'
            OR m.nome Like '%$texto%'       
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

    public function carregarCampos(){

        try {
            $query = "SELECT * FROM campo_missionarios";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    
    public function carregarMissionarios(){

        try {
            $query = "SELECT 
            mis.id_miss,
            mis.data_consag,
            m.nome
            from membros m
            inner join missionarios mis on mis.id_mem=m.id_mem";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarID($id){

        try {
            $query = "SELECT 
            mis.id_miss,
            m.nome,
            mis.data_consag,
            cm.localidade as campo           
            from membros_campos mc
            LEFT join campo_missionarios cm on cm.id_camp=mc.id_camp
            right join membros m on m.id_mem=mc.id_mem 
            right join missionarios mis on mis.id_mem=m.id_mem 
            where mis.id_miss=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(missionariosModel $dados){

        $query = "SELECT * FROM missionarios WHERE id_mem=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->id_mem));

        if($smt->rowCount() == 0){
    
            try {
                $query = "INSERT INTO missionarios (data_consag, id_mem, id_camp) 
                VALUES(?,?,?)";
                $this->Con->prepare($query)->execute(array($dados->data_consag, $dados->id_mem, $dados->id_campo_miss));
                
            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;
        }else{
            return false;
        }
    }
    public function editar(missionariosModel $dados){

        try {
            $query = "UPDATE  missionarios SET data_consag=?, id_mem=?, id_camp=? WHERE id_miss=? ";

            $this->Con->prepare($query)->execute(array($dados->data_consag, $dados->id_mem, $dados->id_campo_miss, $dados->id_miss)); 
            return true;
        } catch (Exception $e){
            return false;
        }
    }


    public function delete($id){

        try {
            $query = "DELETE FROM missionarios WHERE id_miss =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>