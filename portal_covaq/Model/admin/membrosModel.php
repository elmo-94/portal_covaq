<?php


class membrosModel{

    public $Con;
    public $id_novo;
    public $id_mem;  
    public $nome;
    public $ident;
    public $tipo;
    public $identidade;
    public $data_val;
    public $generp;
    public $esta_civil;
    public $ponto_ref;
    public $provincia;
    public $naturalidade;
    public $data_nasc;
    public $idade;
    public $residencia;
    public $telefone;
    public $tel_emerg;
    public $email;
    public $pai;
    public $mae;
    public $grupo_sang;
    public $estado; 
    public $foto;  

    //DADOS DE MEMBRASIA
    public $tipo_memb;
    public $data_bap;
    public $ministro;
    public $local_bap;
    public $proven;
    public $tempo;

    //DADOS DE FINANÇAS
    public $profissao; 
    public $sector; 
    public $dizimo;
    public $ramo_activ;
    public $local_servico;

    //DADOS DE FORMAÇÃO
    public $tipo_formacao;
    public $tipo_formacao2;
    public $nivel; 
    public $instituicao; 
    public $especialidade;
    public $nivel_teo; 
    public $instituicao_teo;
    public $nome_inst_teo; 
    public $curso_teo;
    public $outra_instituicao;

    //DADOS DE ENDEREÇO
    public $bairro; 
    public $rua; 
    public $zona; 
    public $quarteirao;
    public $casa;

    //DADOS DE MINISTÉRIO
    public $tipo_min; 
    public $id_min;
    public $funcao; 
    public $outra_funcao;

    public $id_min2;
    public $funcao2; 
    public $outra_funcao2;

    public $id_min3;
    public $funcao3; 
    public $outra_funcao3;
    

    //DADOS DE MEMBROS_DETALHES
    public $agregado; 
    public $num_filhos; 
    public $estatus; 
    public $conjuge;
    public $tipo_cas;
    public $data_cas;

    //DADOS DE DISCIPULADO
    public $classe_disc;
    public $data_reg_disc;
    public $localidade_disc; 

     //DADOS DE MISSIONARIOS
     public $data_consag;
     public $id_campo_miss;

    //DADOS DE MEMBROS DISCIPULOS
    public $data_reg;
    public $fase; 
    public $estado_disc; 
    public $consagracao; 
    public $id_prof;
    public $professor; 

    //DADOS DE MEMBROS_CAMPO
    public $id_camp; 



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
            $query = "SELECT *
            FROM membros 
            WHERE id_mem = (select max(id_mem) from membros)";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function buscar($texto){
        try {
            $query = "SELECT * FROM membros e 

            WHERE nome Like '%$texto%' 
            OR ident Like '%$texto%'  
            OR tipo Like '%$texto%'
            OR estado Like '%$texto%'
            OR grupo_sang Like '%$texto%'
            OR identidade Like '%$texto%'  
            OR genero Like '%$texto%'
                   
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
            $query = "SELECT *
            FROM membros WHERE id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function consultar($texto){
        try {
            $query = "SELECT *
            FROM membros WHERE identidade=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($texto));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_Membrasia($id){

        try {
            $query = "SELECT *
            FROM membrasias WHERE id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_Financas($id){

        try {
            $query = "SELECT *
            FROM membros_financas WHERE id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_Endereco($id){

        try {
            $query = "SELECT *
            FROM endereco WHERE id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_Detalhes($id){

        try {
            $query = "SELECT *
            FROM membros_detalhes WHERE id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_Ministerio($id){

        try {
            $query = "SELECT
            mi.id_min as id_min,
            mi.nome as ministerio,
            mm.funcao as funcao,
            mm.outra_funcao as outra_funcao
            from membros_min mm
            inner join ministerios mi on mi.id_min=mm.id_min
            where mm.id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_Discipulador($id){

        try {
            $query = "SELECT 
            d.id_discip,
            m.nome,
            d.fase,
            d.localidade,
            d.estado
            from discipuladores d
            inner join membros m on m.id_mem = d.id_mem
            where m.id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_Missionario($id){

        try {
            $query = "SELECT *
            FROM missionarios WHERE id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_MembrosDiscipulos($id){

        try {
            $query = "SELECT 
            md.id_prof,
            md.estado,
            md.fase,
            md.consagracao
            from membros_discipulo md
            where md.id_aluno=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetch(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_Formacao($id){

        try {
            $query = "SELECT *
            FROM formacoes WHERE id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarID_Campos($id){

        try {
            $query = "SELECT
            cm.id_Camp as id_camp,
            m.id_mem as id_mem,
            cm.localidade as localidade
            from membros_campos mc
            inner join membros m on m.id_mem=mc.id_mem
            inner join campo_missionarios cm on cm.id_camp=mc.id_camp 
            where m.id_mem=?";

            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));
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
    public function carregarDiscipuladores(){

        try {
            $query = "SELECT 
            d.id_discip,
            m.nome
            from discipuladores d
            inner join membros m on m.id_mem = d.id_mem
            where d.estado = 'Regular'";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function carregarMinisterios(){

        try {
            $query = "SELECT * FROM ministerios";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }
    public function novoRegisto(){

        try {
            $query = "SELECT MAX(id_mem) as novo from membros  ";

            $smt = $this->Con->prepare($query);
            $smt->execute();
            return $smt->fetchAll(PDO::FETCH_OBJ);
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    public function registar(membrosModel $dados){
        
        $query = "SELECT * FROM membros WHERE identidade=?";
        $smt = $this->Con->prepare($query);
        $smt->execute(array($dados->identidade));

        if($smt->rowCount() == 0 OR !empty($this->$data_bap) OR strlen($this->ident) == 11){

            try {
                if($this->id_camp=='Igreja local'){
                    $this->tipo = 'Igreja local';
                }else{
                    $this->tipo = 'Campo missionário';
                }
                $query = "INSERT INTO membros (nome, ident, tipo, identidade, data_val, genero, esta_civil, provincia,  
                naturalidade,  data_nasc, idade, telefone, tel_emerg, email, pai, mae, grupo_sang, estado, foto) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    
                $this->Con->prepare($query)->execute(array($dados->nome, $dados->ident, $dados->tipo, $dados->identidade, 
                $dados->data_val, $dados->genero, $dados->esta_civil, $dados->provincia,  $dados->naturalidade,  
                $dados->data_nasc, $dados->idade,  $dados->telefone, $dados->tel_emerg, $dados->email, $dados->pai, 
                $dados->mae, $dados->grupo_sang, $dados->estado, $dados->foto)); 
                   
                $id_novo = $this->novoRegisto()[0]->novo;

                if(!empty($this->data_bap)){
                    $this->registar_membrasia($this->tipo_memb, $this->data_bap, $this->ministro, $this->local_bap, $this->tempo, $id_novo, $this->proven);
                }
                 
                if(!empty($this->dizimo)){
                    $this->registar_financas($id_novo, $this->profissao, $this->sector, $this->ramo_activ, $this->dizimo, $this->local_servico);
                }

                if(!empty($this->especialidade)){

                    $this->tipo_formacao="Acadêmica";
                    $this->registar_formacoes($this->tipo_formacao, $this->nivel, $this->instituicao, $this->especialidade, $id_novo, $this->outra_instituicao);
                }

                if(!empty($this->curso_teo)){
                    $this->tipo_formacao2="Teológica";
                    $this->registar_formacoes($this->tipo_formacao2, $this->nivel_teo, $this->instituicao_teo, $this->curso_teo, $id_novo, $this->outra_instituicao);
                }
                
                if(!empty($this->bairro) || !empty($this->quarteirao)){

                    $this->registar_enderecos($id_novo, $this->bairro, $this->rua, $this->zona, $this->quarteirao, $this->casa, $this->ponto_ref);
                }
                if(!empty($this->agregado) || !empty($this->estatus)){
                    
                    if(empty($this->data_cas)){
                        $this->data_cas=null;
                    }
                    $this->registar_mem_detalhes($id_novo, $this->agregado, $this->num_filhos, $this->estatus, $this->conjuge, $this->tipo_cas, $this->data_cas);
                }
                 
               
                if(!empty($this->id_min) && !empty($this->funcao)){
                        $this->registar_ministerio($this->id_min, $id_novo, $this->funcao, $this->outra_funcao);

                    if(!empty($this->id_min2) && !empty($this->funcao2)){
                        $this->registar_ministerio($this->id_min2, $id_novo, $this->funcao2, $this->outra_funcao2);

                        if(!empty($this->id_min3) && !empty($this->funcao3)){
                            $this->registar_ministerio($this->id_min3, $id_novo, $this->funcao3, $this->outra_funcao3);
                        }
                    }
                }
  
                if(!empty($this->classe_disc)){
              
                    if($this->classe_disc == 'Discipulador'){
                      
                        $this->registar_discipulador($this->data_reg, $this->localidade_disc, $this->fase, $this->estado_disc, $id_novo);
                    }
                    else if($this->classe_disc == 'Discipulo'){

                        if(!empty($this->id_prof) && !empty($this->fase)){
                            
                            $this->registar_discipulo($id_novo, $this->fase, $this->consagracao, $this->estado_disc, $this->id_prof);
                        }
                    }                   
                }

                if(!empty($this->id_campo_miss)){
                    $this->registar_missionario($id_novo, $this->id_campo_miss);
                }
                
                if(!empty($this->id_camp) && $this->id_camp != 'Igreja local'){
                    
                    $this->registar_campos($this->id_camp, $id_novo);
                }             
                    

            } catch (Exception $e){
                die($e->getMessage());
            }                      
                        
            return true; 
               
        }else{
            return false;
        }      
    }

    public function editar(membrosModel $dados){
        
        try {
            $query = "UPDATE  membros SET  nome=?, tipo=?, identidade=?, data_val=?, genero=?, esta_civil=?,  provincia=?,  
            naturalidade=?,  data_nasc=?, idade=?, telefone=?, tel_emerg=?, email=?, pai=?, mae=?, grupo_sang=?, estado=?, foto=? 
            where id_mem=?";

            $this->Con->prepare($query)->execute(array($dados->nome, $dados->tipo, $dados->identidade, $dados->data_val, $dados->genero, 
            $dados->esta_civil, $dados->provincia, $dados->naturalidade,  $dados->data_nasc, $dados->idade,
            $dados->telefone, $dados->tel_emerg, $dados->email, $dados->pai, $dados->mae, $dados->grupo_sang, $dados->estado, $dados->foto, 
            $dados->id_mem));

            if(!empty($this->data_bap)){
                $this->editar_membrasia();
            }
             
            if(!empty($this->dizimo)){
                $this->editar_financas();
            }
            /*
            if(!empty($this->especialidade)){

                $this->tipo_formacao="Acadêmica";
                $this->editar_formacoes();
            }

            if(!empty($this->curso_teo)){
                $this->tipo_formacao2="Teológica";
                $this->editar_formacoes();
            }

            if(!empty($this->id_min) && !empty($this->funcao)){
                $this->editar_ministerio();
            }
            */
            
            if(!empty($this->bairro) || !empty($this->quarteirao)){

                $this->editar_enderecos();
            }
            if(!empty($this->agregado) || !empty($this->estatus)){
                
                
                $this->editar_mem_detalhes();
            }
             
            if(!empty($this->classe_disc)){
          
                if($this->classe_disc == 'Discipulador'){
                  
                    $this->editar_discipulador();
                }
                elseif($this->classe_disc == 'Discipulo'){

                    if(!empty($this->id_prof) && !empty($this->fase)){
                        
                        $this->editar_discipulo();
                    }
                }                   
            }
            
            if(!empty($this->id_campo_miss)){
                $this->editar_missionario();
            }
            
            
            return true;
        
        } catch (Exception $e){
            return false;
        }
    }

    public function delete($id){

        try {
            $query = "DELETE FROM membros WHERE id_mem =?";

                
            $this->delete_campos($id);
            
            /*
            $this->delete_membrasia($id);
            $this->delete_finanças($id);
            $this->delete_formacoes($id);
            $this->delete_discipulador($id);
            $this->delete_enderecos($id);

            
            $this->delete_mem_detalhes($id);
            $this->delete_ministerio($id);
            $this->delete_discipulo($id);
*/
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id));

            return true;

        } catch (EXCEPTION $e) {
            return false;
            //die($e->getMessage());

        }
    }
    
    



    // MÉTODOS DE MEMBRASIA

    public function registar_membrasia($tipo_memb, $data_bap, $ministro, $local_bap, $tempo, $id_mem, $proven){

        try {
            $query = "INSERT INTO membrasias (tipo_memb, data_bap, ministro, local_bap, tempo, id_mem, proven) 
            VALUES(?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($tipo_memb, $data_bap, $ministro, $local_bap, $tempo, $id_mem, $proven)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function editar_membrasia(){
        //print_r($this->id_mem);exit;

        try {
            $query = "UPDATE  membrasias SET tipo_memb=?, data_bap=?, ministro=?, local_bap=?, tempo=?, proven=?
             where id_mem=?";

            $this->Con->prepare($query)->execute(array($this->tipo_memb, $this->data_bap, $this->ministro, $this->local_bap, $this->tempo, $this->proven, $this->id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_membrasia($id_mem){

        $resultado =$this->Con->query("SELECT * FROM membrasias WHERE id_mem=$id_mem");          
        if($resultado->rowCount() > 0){
            $query = "DELETE FROM membrasias WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        }
    }

    // MÉTODOS DE FINANÇAS
    public function registar_financas($id_mem, $profissao, $sector, $ramo_activ,  $dizimo, $local_servico){

        try {
            $query = "INSERT INTO membros_financas(id_mem, profissao, sector, ramo_activ,  dizimo, local_servico )
            VALUES(?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($id_mem, $profissao, $sector, $ramo_activ,  $dizimo, $local_servico)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
    public function editar_financas(){

        try {
        $query = "UPDATE  membros_financas SET profissao=?, sector=?, ramo_activ=?,  dizimo=?, local_servico=?
             where id_mem=?";

            $this->Con->prepare($query)->execute(array($this->profissao, $this->sector, $this->ramo_activ, $this->dizimo, $this->local_servico, $this->id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_finanças($id_mem){
       
        $resultado =$this->Con->query("SELECT * FROM membros_financas WHERE id_mem=$id_mem");          
        if($resultado->rowCount() > 0){
            $query = "DELETE FROM membros_financas WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        }
    }

    // MÉTODOS DE DETALHES DO MEMBRO
    public function registar_mem_detalhes($id_mem, $agregado, $num_filhos, $estatus, $conjuge, $tipo_cas, $data_cas){

        try {
            $query = "INSERT INTO membros_detalhes(id_mem, agregado, num_filhos, estatus, conjuge, tipo_cas, data_cas)
            VALUES(?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($id_mem, $agregado, $num_filhos, $estatus, $conjuge, $tipo_cas, $data_cas)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
    public function editar_mem_detalhes(){

        try {
            $resultado =$this->Con->query("SELECT * FROM endereco WHERE id_mem= $this->id_mem");          
            if($resultado->rowCount() > 0){
                $query = "UPDATE  membros_detalhes SET agregado=?, num_filhos=?, estatus=?, conjuge=?, tipo_cas=?, data_cas=? where id_mem=?";
                if(empty($this->data_cas)){
                    $this->data_cas=null;
                }
               $this->Con->prepare($query)->execute(array($this->agregado, $this->num_filhos, $this->estatus, $this->conjuge, $this->tipo_cas, $this->data_cas, $this->id_mem)); 
            }else{

                if(empty($this->data_cas)){
                    $this->data_cas=null;
                }
                $this->registar_mem_detalhes($this->id_mem, $this->agregado, $this->num_filhos, $this->estatus, $this->conjuge, $this->tipo_cas, $this->data_cas);
            }

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_mem_detalhes($id_mem){

        $resultado =$this->Con->query("SELECT * FROM membros_detalhes WHERE id_mem=$id_mem");          
        if($resultado->rowCount() > 0){
            $query = "DELETE FROM membros_detalhes WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        }
    }

    // MÉTODOS DE ENDEREÇOS
    public function registar_enderecos($id_mem, $bairro, $rua, $zona, $quarteirao, $casa, $ponto_ref){

        try {
            $query = "INSERT INTO endereco (id_mem, bairro, rua, zona, quarteirao, casa, ponto_ref)
            VALUES(?,?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($id_mem, $bairro, $rua, $zona, $quarteirao, $casa, $ponto_ref)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
    public function editar_enderecos(){

        try {
            $resultado =$this->Con->query("SELECT * FROM endereco WHERE id_mem = $this->id_mem");  
             
            if($resultado->rowCount() > 0){

                $query = "UPDATE  endereco SET bairro=?, rua=?, zona=?, quarteirao=?, casa=?, ponto_ref=?
                where id_mem=?";
                $this->Con->prepare($query)->execute(array( $this->bairro, $this->rua, $this->zona, $this->quarteirao, $this->casa, $this->ponto_ref, $this->id_mem)); 

            }else{
                $this->registar_enderecos($this->id_mem, $this->bairro, $this->rua, $this->zona, $this->quarteirao, $this->casa, $this->ponto_ref);
            }
            

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_enderecos($id_mem){

        $resultado =$this->Con->query("SELECT * FROM endereco WHERE id_mem=$id_mem");          
        if($resultado->rowCount() > 0){
            $query = "DELETE FROM endereco WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        }
    }

    // MÉTODOS DE FORMACOES
    public function registar_formacoes($tipo_formacao, $nivel, $instituicao, $especialidade,$id_mem, $outra_instituicao){

        try {
            $query = "INSERT INTO formacoes(tipo, nivel, instituicao, especialidade, id_mem, outra_instituicao)
            VALUES(?,?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($tipo_formacao, $nivel, $instituicao, $especialidade, $id_mem, $outra_instituicao)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
    public function editar_formacoes(){

        try {
            $query = "UPDATE  formacoes SET tipo=?, nivel=?, instituicao=?, especialidade=?, outra_instituicao=?
             where id_mem=?";

            $this->Con->prepare($query)->execute(array($this->tipo_formacao, $this->nivel, $this->instituicao, $this->especialidade, $this->outra_instituicao, $this->id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_formacoes($id_mem){

        try {
            $query = "DELETE FROM formacoes WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        } catch (EXCEPTION $e) {
            die($e->getMessage());
        }
    }

    // MÉTODOS DE MINISTÉRIOS
    public function registar_ministerio($id_min, $id_mem, $funcao,$outra_funcao){

        try {
            $query = "INSERT INTO membros_min (id_min, id_mem, funcao, outra_funcao)
            VALUES(?,?,?,?)";

            $this->Con->prepare($query)->execute(array($id_min, $id_mem,  $funcao, $outra_funcao)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
    public function editar_ministerio(){

        try {
            $query = "UPDATE  membros_min SET funcao=?, outra_funcao=?
             where id_mem=?";

            $this->Con->prepare($query)->execute(array($this->funcao, $this->outra_funcao,  $this->id_novo)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_ministerio($id_mem){

        $resultado =$this->Con->query("SELECT * FROM ministerios WHERE id_mem=$id_mem");          
        if($resultado->rowCount() > 0){
            $query = "DELETE FROM ministerios WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        }
    }

    // MÉTODOS DE DISCIPULADOR
    public function registar_discipulador($data_reg, $localidade, $fase, $estado, $id_mem){

        try {
            $query = "INSERT INTO discipuladores (data_reg, localidade, fase, estado, id_mem)
            VALUES(?,?,?,?,?)";

            $this->Con->prepare($query)->execute(array($data_reg, $localidade, $fase, $estado, $id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
    public function editar_discipulador(){

        try {           
            $resultado = $this->Con->query("SELECT * FROM membros_min WHERE id_mem= $this->id_mem");          
            if($resultado->rowCount() > 0){

                $query = "UPDATE  membros_min SET data_reg=?, localidade=?, fase=? estado=?
                where id_mem=?";
                $this->Con->prepare($query)->execute(array($this->data_reg, $this->localidade, $this->fase, $this->estado_disc, $this->idm));
            }
            else{
                $this->registar_discipulador($this->data_reg, $this->localidade_disc, $this->fase, $this->estado_disc, $this->id_mem);
            }
        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_discipulador($id_mem){

        $resultado =$this->Con->query("SELECT * FROM discipuladores WHERE id_mem=$id_mem");          
        if($resultado->rowCount() > 0){
            $query = "DELETE FROM discipuladores WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        }
    }

    // MÉTODOS DE MEMBROS DISCIPULOS
    public function registar_discipulo($id_novo, $fase, $consagracao, $estado_disc, $id_prof){

        try {
            $query = "INSERT INTO membros_discipulo(fase, consagracao, estado, id_prof, id_aluno)
            VALUES(?,?,?,?,?)";
            
            $this->Con->prepare($query)->execute(array($fase, $consagracao, $estado_disc, $id_prof, $id_novo));
 
        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
    public function editar_discipulo(){

        try {
            $query = "UPDATE  membros_discipulo SET fase=?, estado=?, consagracao=?, id_prof=?
             where id_aluno=?";

            $this->Con->prepare($query)->execute(array( $this->fase, $this->estado_disc, $this->consagracao, $this->id_prof, $this->id_novo)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_discipulo($id_mem){

        $resultado =$this->Con->query( "SELECT * FROM membros_discipulo WHERE id_mem=$id_mem");
            
        if($resultado->rowCount() > 0){
            $query = "DELETE FROM membros_discipulo WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        }
    }

    // MÉTODOS DE MISSIONARIOS
    public function registar_missionario($id_camp, $id_mem){

        try {
            
            $query = "INSERT INTO missionarios (id_mem, id_camp)
            VALUES(?,?)";
            $this->Con->prepare($query)->execute(array($id_camp, $id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
    public function editar_missionario(){
        try {
            $resultado = $this->Con->query("SELECT * FROM missionarios WHERE id_mem = $this->id_mem");          
            if($resultado->rowCount() > 0){
                $query = "UPDATE  missionarios SET id_camp=?, id_mem=?
                where id_mem=?";
               $this->Con->prepare($query)->execute(array($this->id_campo_miss, $this->id_mem)); 
            }
            else{
                $query = "INSERT INTO missionarios (id_camp, id_mem)
                VALUES(?,?)";
                $this->Con->prepare($query)->execute(array($this->id_campo_miss, $this->id_mem)); 
            }           

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_missionario($id_mem){

        $resultado =$this->Con->query( "SELECT * FROM missionarios WHERE id_mem=$id_mem");
            
        if($resultado->rowCount() > 0){
            $query = "DELETE FROM missionarios WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        }
    }

    // MÉTODOS DE MEMBROS POR CAMPOS
    public function registar_campos($id_camp, $id_mem){

        try {
            $query = "INSERT INTO membros_campos (id_camp, id_mem)
            VALUES(?,?)";

            $this->Con->prepare($query)->execute(array($id_camp, $id_mem)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }
    
    public function editar_campos(){

        try {
            $query = "UPDATE  membros_campos SET id_camp=?
             where id_mem=?";

            $this->Con->prepare($query)->execute(array($this->id_camp, $this->id_novo)); 

        } catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function delete_campos($id_mem){

        $resultado =$this->Con->query( "SELECT * FROM membros_campos WHERE id_mem=$id_mem");
            
        if($resultado->rowCount() > 0){
            $query = "DELETE FROM membros_campos WHERE id_mem =?";
            $smt = $this->Con->prepare($query);
            $smt->execute(array($id_mem));
        }
    }
}

?>