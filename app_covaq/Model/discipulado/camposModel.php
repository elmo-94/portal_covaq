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
            $query = "SELECT 
            cm.id_camp, 
            cm.localidade, 
            cm.data_fund, 
            m.nome
            from membros_campos mc
            right join campo_missionarios cm on cm.id_camp=mc.id_camp
            LEFT join membros m on m.id_mem=mc.id_mem 
            LEFT join missionarios mis on mis.id_mem=m.id_mem";

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
            cm.id_camp, 
            cm.localidade, 
            cm.data_fund, 
            m.nome
            from membros_campos mc
            right join campo_missionarios cm on cm.id_camp=mc.id_camp
            LEFT join membros m on m.id_mem=mc.id_mem 
            LEFT join missionarios mis on mis.id_mem=m.id_mem 

            WHERE cm.localidade Like '%$texto%' OR m.nome Like'%$texto%'
            OR m.nome Like '%$texto%' 
            OR cm.localidade Like '%$texto%'                 
            ";
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
            $query = "SELECT * FROM campo_missionarios WHERE id_camp=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(camposModel $dados){

        $query = "SELECT * FROM campo_missionarios WHERE id_camp=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->id_mem));

        if($smt->rowCount() == 0){
    
            try {
                $query = "INSERT INTO campo_missionarios (localidade, data_fund) 
                VALUES(?,?)";

                $this->Con->prepare($query)->execute(array($dados->localidade, $dados->data_fund));
                
            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;
        }else{
            return false;
        }
    }
    public function editar(camposModel $dados){

        try {
            $query = "UPDATE  campo_missionarios SET localidade=?, data_fund=? WHERE id_camp=? ";

            $this->Con->prepare($query)->execute(array($dados->localidade, 
            $dados->data_fund, $dados->id_mem, $dados->id_mem)); 
            return true;

        } catch (Exception $e){
            return false;
        }
    }


    public function delete($id){

        try {
            $query = "DELETE FROM campo_missionarios WHERE id_camp =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>