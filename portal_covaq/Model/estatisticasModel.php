<?php

class estatisticasModel{


    public function __construct(){

        try {
            $this->Con = conexao::conectar();          
            
        } catch (Exception $e) {
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
    public function estatisticas_administractiva(){

        try {
            $query = "SELECT count(id_mem) as total_membros,           
            (select COUNT(id_min) from ministerios) as total_min,
            (select COUNT(id_sol) from solicitacoes) as total_sol,
            (select COUNT(id_obra) from obras) as total_obras,
            (select COUNT(id_discip) from discipuladores) as discip,
            (select COUNT(id_camp) from campo_misscionarios) as campos,
            (select COUNT(id_obra) from obras where estado ='Concluída') as oc,
            (select count(id_transf) from transf_membros) as mt,
            (select COUNT(id_mat) from matrimonios) as cas          
             from membros";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function estatisticas_financeira(){

        try {
            $query = "SELECT count(id_mem),           
                
            (select COUNT(id_saida) from saidas) as saidas,
            (select COUNT(id_mov) from movimentacoes where categoria='Receita') as receitas,
            (select COUNT(id_mov) from movimentacoes where categoria='Despesa') as despesas,
            (select COUNT(id_conta) from contas where tipo='a pagar') as pagar,
            (select COUNT(id_conta) from contas where tipo='a receber')as receber,
            (select COUNT(id_conta) from contas where estado='Atrasada') as contas_atrasadas
             from membros";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function estatisticas_discipulado(){

        try {
            $query = "SELECT count(id_mem),           
            (select COUNT(id_min) from ministerios) as min,
            (select COUNT(id_sol) from solicitacoes) as sol,
            (select COUNT(id_obra) from obras) as obras,
            (select COUNT(id_obra) from obras where estado ='Concluída') as oc,
            (select count(id_transf) from transf_membros) as mt,
            (select COUNT(id_mat) from matrimonios) as cas
             from membros";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }

    }
    public function estatisticas_total(){

        try {
            $query = "SELECT SUM(valor) as total_ent,
            (select SUM(valor) from movimentacoes where categoria='Despesa') as total_saida,
            (SELECT SUM(valor) from movimentacoes where categoria='Receita')-(SELECT SUM(valor) from movimentacoes where categoria='Despesa') as saldo
            from movimentacoes where categoria='Receita'";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function cresc_igreja(){

        try {
            $query = "SELECT
            year(data_bap)as ano,
            COUNT(id_membrasia) as total
            from membrasias
            GROUP by year(data_bap)
            ORDER by data_bap DESC limit 7";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function entradas_anuais(){

        try {
            $query = 
            "SELECT year(data_reg) as ano,
            month(data_reg) as mes,
            sum(valor) as total
            from dizimos
            GROUP by year(data_reg), month(data_reg)
            ORDER by year(data_reg), month(data_reg)";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function ultimas_informacoes(){

        try {
            $query = "SELECT * FROM informacoes order by id_info desc LIMIT 7";
            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }


 
}


//:::::::::::::::::::::::::::::::::::::



?>