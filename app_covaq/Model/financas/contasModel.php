<?php

class contasModel{

    public $Con;

    public $id_conta;
    public $data_reg;
    public $conta;
    public $tipo;
    public $data_venc;
    public $id_tipopag;
    public $valor;
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
            $query = "SELECT c.id_conta, c.data_reg, c.conta,
            c.tipo, c.data_venc, p.tipopag, c.valor, c.estado
            FROM contas c 
            INNER JOIN tipo_pagamentos p on p.id_tipopag = c.id_tipopag
            ORDER BY id_conta DESC ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT c.id_conta, c.data_reg, c.conta,
            c.tipo, c.data_venc, p.tipopag, c.valor, c.estado
            FROM contas c 
            INNER JOIN tipo_pagamentos p on p.id_tipopag = c.id_tipopag

            WHERE c.data_reg Like '%$texto%' 
            OR c.conta Like'%$texto%'
            OR c.tipo Like '%$texto%' 
            OR c.tipo Like '%$texto%'
            OR c.estado Like '%$texto%'          
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function carregarTipoPag(){

        try {
            $query = "SELECT * FROM tipo_pagamentos";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function Contas_Atrasadas(){

        try {
            $query = "SELECT conta, valor from contas	
            where contas.estado='Atrasado'";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID($id){

        try {
            $query = "SELECT * FROM contas WHERE id_conta=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(contasModel $dados){

            try {
                $query = "INSERT INTO contas (data_reg, conta, tipo, data_venc, id_tipopag, valor, estado) 
                VALUES(?,?,?,?,?,?,?)";

                $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->conta, $dados->tipo, 
                $dados->data_venc, $dados->id_tipopag, $dados->valor, $dados->estado)); 

                $categoria_mov='';
                if($dados->tipo != 'A pagar'){
                    $categoria_mov= 'Receita';
                }else{
                    $categoria_mov= 'Despesa';
                }
                $this->registar_Movimentacao($dados->data_reg, $categoria_mov, $dados->conta, $dados->valor);
                return true;
            } catch (Exception $e){
                return false;
            }
            
    }
    public function editar(contasModel $dados){

        try {
            $query = "UPDATE  contas SET data_reg=?, conta=?, tipo=?, data_venc=?, id_tipopag=?, valor=?, estado=? 
            WHERE id_conta=?";

            $this->Con->prepare($query)->execute(array($dados->data_reg, $dados->conta, $dados->tipo, 
            $dados->data_venc, $dados->id_tipopag, $dados->valor, $dados->estado,$dados->id_conta)); 
            return true;
        } catch (Exception $e){
            return false;
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM contas WHERE id_conta =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return true;
        } catch (EXCEPTION $e) {
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



//:::::::::::::::::::::::::::::::::::::



?>