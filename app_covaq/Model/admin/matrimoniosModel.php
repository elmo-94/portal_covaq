<?php

class matrimoniosModel{

    public $Con;

    public $id_mat;
    public $data_reg;
    public $num_reg;
    public $localidade;
    public $ministro;
    public $id_noivo;
    public $id_noiva;
    public $padrinho;
    public $madrinha;
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
            $query = "SELECT mt.id_mat, mt.data_reg,
            mt.num_reg,
            mt.localidade,
            mt.ministro,
            (select nome from membros where id_mem=mt.id_noivo) as noivo,
            (select nome from membros where id_mem=mt.id_noiva) as noiva,
            mt.padrinho, mt.madrinha, mt.estado            
            from matrimonios mt         
            ORDER BY mt.id_mat DESC";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT mt.id_mat, mt.data_reg,
            mt.num_reg,
            mt.localidade,
            mt.ministro,
            (select nome from membros where id_mem=mt.id_noivo) as noivo,
            (select nome from membros where id_mem=mt.id_noiva) as noiva,
            mt.padrinho, mt.madrinha, mt.estado            
            from matrimonios mt
            WHERE mt.estado Like '%$texto%'  
            OR mt.num_reg Like '%$texto%'
            OR mt.localidade Like '%$texto%'
            OR mt.ministro Like '%$texto%'      
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
            $query = "SELECT * FROM membros ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarMembros_solteiro(){

        try {
            $query = "SELECT * FROM membros where esta_civil != 'Casado'";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarID($id){

        try {
            $query = "SELECT * FROM matrimonios WHERE id_mat=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(matrimoniosModel $dados){

        $query = "SELECT * FROM matrimonios WHERE num_reg=?";

        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->num_reg));

        if($smt->rowCount() == 0){

            try {
                $query = "INSERT INTO matrimonios (data_reg, num_reg, localidade, 
                ministro, id_noivo, id_noiva, padrinho, madrinha, estado) 
                VALUES(?,?,?,?,?,?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->data_reg, 
                $dados->num_reg, $dados->localidade, $dados->ministro, $dados->id_noivo, $dados->id_noiva, $dados->padrinho,
                $dados->madrinha, $dados->estado));

                if($dados->estado != 'Divórcio'){

                    $this->alterar_estado_civil('Casado', $dados->id_noivo, $dados->id_noiva);
                }else{
                    $this->alterar_estado_civil('Divorciado', $dados->id_noivo, $dados->id_noiva);
                }
                
            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;
        }else{
            return false;
        }
    }
    public function editar(matrimoniosModel $dados){

        
        try {
            if($dados->estado != 'Divórcio'){

                $this->alterar_estado_civil('Casado', $dados->id_noivo, $dados->id_noiva);
            }else{
                $this->alterar_estado_civil('Divorciado', $dados->id_noivo, $dados->id_noiva);
            }
            $query = "UPDATE  matrimonios SET data_reg=?, num_reg=?, localidade=?, 
            ministro=?, id_noivo=?, id_noiva=?, padrinho=?, madrinha=?, estado=? WHERE id_mat=? ";

            $this->Con->prepare($query)->execute(array($dados->data_reg, 
            $dados->num_reg, $dados->localidade, $dados->ministro, $dados->id_noivo, $dados->id_noiva, $dados->padrinho,
            $dados->madrinha, $dados->estado, $dados->id_mat)); 

            

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function alterar_estado_civil($estado, $id_noivo, $id_noiva){

        try {
            $query = "UPDATE  membros SET esta_civil=?
             WHERE id_mem=? ";

            $this->Con->prepare($query)->execute(array($estado, $id_noivo));
            $this->Con->prepare($query)->execute(array($estado, $id_noiva)); 
            return true;

        } catch (Exception $e){
            return false;
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM matrimonios WHERE id_mat =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }
}

?>