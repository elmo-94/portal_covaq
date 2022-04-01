<?php

class obrasModel{

    public $Con;

    public $id_obra;
    public $descricao;
    public $localidade;
    public $data_inicio;
    public $data_fim;
    public $financiador;
    public $orcamento;
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
            $query = "SELECT * FROM obras
            ORDER BY id_obra DESC ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * FROM obras
            WHERE localidade Like '%$texto%' 
            OR descricao Like '%$texto%'
            OR estado Like '%$texto%'        
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
            $query = "SELECT * FROM obras WHERE id_obra=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(obrasModel $dados){

        $query = "SELECT * FROM obras WHERE descricao=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->descricao));

        if($smt->rowCount() == 0){

            try {
                $query = "INSERT INTO obras (descricao, localidade, data_inicio, data_fim, financiador,
                orcamento, estado) 
                VALUES(?,?,?,?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->descricao, $dados->localidade, 
                $dados->data_inicio, $dados->data_fim, $dados->financiador, $dados->orcamento, $dados->estado)); 

                //Registar conta a pagar
                $this->registar_contas(date("Y-m-d"), $dados->descricao, 'A pagar' ,null, 1, $dados->orcamento, 'Não pago');

            } catch (Exception $e){
                die($e->getMessage());
            }
            return true;
        }else{
            return false;
        }
    }
    public function editar(obrasModel $dados){

            try {
                $query = "UPDATE  obras SET descricao=?, localidade=?, data_inicio=?, data_fim=?, financiador=?,
                orcamento=?, estado=?
                where id_obra=?";

                $this->Con->prepare($query)->execute(array($dados->descricao, $dados->localidade, 
                $dados->data_inicio, $dados->data_fim, $dados->financiador, $dados->orcamento, $dados->estado, $dados->id_obra)); 
                return true;
            } catch (Exception $e){
                return false;
            }
            

    }

    public function delete($id){

        try {
            $query = "DELETE FROM obras WHERE id_obra =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }

    public function registar_contas($data_reg, $conta, $tipo, $data_venc, $id_tipopag, $valor, $estado){

        try {
            $query = "INSERT INTO contas (data_reg, conta, tipo, data_venc, id_tipopag, valor, estado) 
            VALUES(?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($data_reg, $conta, $tipo, $data_venc, $id_tipopag, $valor, $estado)); 

            $categoria_mov='';
            if($tipo != 'A pagar'){
                $categoria_mov= 'Receita';
            }else{
                $categoria_mov= 'Despesa';
            }
            //Registit movimentações
            $this->registar_Movimentacao(date("Y-m-d"), $categoria_mov, 'Óbras', $valor);
            return true;
        } catch (Exception $e){
            return false;
        }
    }
    public function registar_Movimentacao($data_reg, $categoria, $tipo, $valor){

        try {
            $query = "INSERT INTO movimentacoes (data_reg,categoria,tipo,valor)VALUES(?,?,?,?)";

            $this->Con->prepare($query)->execute(array($data_reg, $categoria, $tipo, $valor)); 
           
        } catch (Exception $e){
            die($e->getMessage());
        }
    }
}

?>