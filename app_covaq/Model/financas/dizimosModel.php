<?php

class dizimosModel{

    public $Con;

    public $id_diz;
    public $data_reg;
    public $mes;
    public $id_tipopag;
    public $semana;
    public $valor;
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
            $query = "SELECT d.id_diz, d.data_reg, m.nome,m.ident, 
            d.mes, d.semana, p.tipopag, d.valor
            FROM dizimos d 
            INNER JOIN tipo_pagamentos p on p.id_tipopag = d.id_tipopag
            INNER JOIN membros m on m.id_mem=d.id_mem
            
            ORDER BY id_diz DESC ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    
    public function buscar($texto){
        try {
            $query = "SELECT d.id_diz, d.data_reg, m.nome, m.ident,
            d.mes, d.semana, p.tipopag, d.valor
            FROM dizimos d 
            INNER JOIN tipo_pagamentos p on p.id_tipopag = d.id_tipopag
            INNER JOIN membros m on m.id_mem=d.id_mem        
            WHERE d.data_reg Like '%$texto%' OR m.ident Like'%$texto%'
            OR m.nome Like '%$texto%'
            OR m.ident Like '%$texto%' 
            OR m.identidade Like '%$texto%'  
            OR d.mes Like '%$texto%'
            OR p.tipopag Like '%$texto%'
            OR d.semana Like '%$texto%'          
            ";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function listar_consulta(){

        try {
            $query = "SELECT 
            m.id_mem,
            m.ident,
            m.nome,
            m.identidade,
            m.genero,
            mf.dizimo,
            d.mes,
            year(d.data_reg) as ano,
            SUM(d.valor) as valor,
            ((SUM(d.valor)/mf.dizimo)*100) as perc
            FROM tipo_pagamentos p
            RIGHT JOIN  dizimos d on d.id_tipopag = p.id_tipopag
            RIGHT JOIN membros m on m.id_mem=d.id_mem
            RIGHT join membros_financas mf on mf.id_mem=m.id_mem
            GROUP by month(d.data_reg), m.id_mem
            order by perc desc";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar_dados($texto){
        try {
            $query = "SELECT 
            m.id_mem,
            m.ident,
            m.identidade,
            m.nome,
            m.genero,
            mf.dizimo,
            d.mes,
            year(d.data_reg) as ano,
            SUM(d.valor) as valor,
            ((SUM(d.valor)/mf.dizimo)*100) as perc
            FROM tipo_pagamentos p
            RIGHT JOIN  dizimos d on d.id_tipopag = p.id_tipopag
            RIGHT JOIN membros m on m.id_mem=d.id_mem
            RIGHT join membros_financas mf on mf.id_mem=m.id_mem

            WHERE m.nome Like '%$texto%'
            OR m.ident Like '%$texto%' 
            OR m.identidade Like '%$texto%'  
            OR m.genero Like '%$texto%' 
            OR d.mes Like '%$texto%'
            OR year(d.data_reg) Like '%$texto%'

            GROUP by month(d.data_reg), m.id_mem
            order by perc desc";
            $smt = $this->Con->prepare($query);
            $smt->execute();//array($texto)
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
    public function carregarID($id){

        try {
            $query = "SELECT * FROM dizimos WHERE id_diz=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(dizimosModel $dados){

        try {
            $query = "INSERT INTO dizimos (data_reg, mes, id_tipopag, semana, 
            valor, id_mem) 
            VALUES(?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($dados->data_reg, 
            $dados->mes, $dados->id_tipopag, $dados->semana, $dados->valor, $dados->id_mem)); 

            $this->registar_Movimentacao($dados->data_reg, 'Receita', 'Dízimos', $dados->valor);
            return true;
        } catch (Exception $e){
            //return false; 
            
        }
    }
    public function editar(dizimosModel $dados){

            try {
                $query = "UPDATE  dizimos SET data_reg=?, mes=?,
                id_tipopag=?, semana=? , valor=?, id_mem=?
                WHERE id_diz=? ";

                $this->Con->prepare($query)->execute(array($dados->data_reg, 
                $dados->mes, $dados->id_tipopag, $dados->semana, $dados->valor, $dados->id_mem, $dados->id_diz)); 
                return true;
            } catch (Exception $e){
                return false;
            }          
    }

    public function delete($id_viatura){

        try {
            $query = "DELETE FROM dizimos WHERE id_diz =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_viatura));
            return true;
        } catch (EXCEPTION $e) {
            return false;
        }
    }

    public function registar_Movimentacao($data_reg, $categoria, $tipo, $valor){

        try {
            $query = "INSERT INTO movimentacoes (data_reg,categoria,tipo,valor)VALUES(?,?,?,?)";

            $this->Con->prepare($query)->execute(array($data_reg, $categoria, $tipo, $valor)); 
            return true;
        } catch (Exception $e){
            return false;
        }
    }
}

?>