<?php include 'config.php'; 

if(isset($_REQUEST['id'])){

    if(!empty($this->Model->carregarID_Membrasia($_REQUEST['id']))){

        $tipo_memb = $this->Model->carregarID_Membrasia($_REQUEST['id'])->tipo_memb;
        $data_bap = $this->Model->carregarID_Membrasia($_REQUEST['id'])->data_bap;
        //print_r($data_bap);exit;
        $ministro = $this->Model->carregarID_Membrasia($_REQUEST['id'])->ministro;
        $tempo = $this->Model->carregarID_Membrasia($_REQUEST['id'])->tempo;
        $local_bap = $this->Model->carregarID_Membrasia($_REQUEST['id'])->local_bap;
        $proven = $this->Model->carregarID_Membrasia($_REQUEST['id'])->proven;
    }else{
        $data_bap = ''; $ministro = ''; $tempo = ''; $local_bap = ''; $proven='';  
    }

    if(!empty($this->Model->carregarID_Financas($_REQUEST['id'])) ){
    
        $profissao = $this->Model->carregarID_Financas($_REQUEST['id'])->profissao;
        $sector = $this->Model->carregarID_Financas($_REQUEST['id'])->sector;
        $ramo_activ = $this->Model->carregarID_Financas($_REQUEST['id'])->ramo_activ;
        $dizimo = $this->Model->carregarID_Financas($_REQUEST['id'])->dizimo;
        $local_servico = $this->Model->carregarID_Financas($_REQUEST['id'])->local_servico;
    }else{
        $profissao = ''; $sector = ''; $ramo_activ = ''; $dizimo = ''; $local_servico='';
    }

    if(!empty($this->Model->carregarID_Endereco($_REQUEST['id'])) ){
    
        $bairro = $this->Model->carregarID_Endereco($_REQUEST['id'])->bairro;
        $rua = $this->Model->carregarID_Endereco($_REQUEST['id'])->rua;
        $zona = $this->Model->carregarID_Endereco($_REQUEST['id'])->zona;
        $quarteirao = $this->Model->carregarID_Endereco($_REQUEST['id'])->quarteirao;
        $casa = $this->Model->carregarID_Endereco($_REQUEST['id'])->casa;
        $ponto_ref = $this->Model->carregarID_Endereco($_REQUEST['id'])->ponto_ref;
    }else{
        $bairro=''; $rua=''; $zona=''; $quarteirao=''; $casa=''; $ponto_ref='';
    }

    if(!empty($this->Model->carregarID_Detalhes($_REQUEST['id'])) ){
    
        $agregado = $this->Model->carregarID_Detalhes($_REQUEST['id'])->agregado;
        $num_filhos = $this->Model->carregarID_Detalhes($_REQUEST['id'])->num_filhos;
        $estatus = $this->Model->carregarID_Detalhes($_REQUEST['id'])->estatus;
        $conjuge = $this->Model->carregarID_Detalhes($_REQUEST['id'])->conjuge;
        $tipo_cas = $this->Model->carregarID_Detalhes($_REQUEST['id'])->tipo_cas;
        $data_cas = $this->Model->carregarID_Detalhes($_REQUEST['id'])->data_cas;
    }else{
        $agregado = ''; $num_filhos = ''; $estatus = ''; $conjuge = ''; $data_cas=''; $tipo_cas='';
    }

    if(!empty($this->Model->carregarID_Ministerio($_REQUEST['id'])) ){
    
        $id_min = $this->Model->carregarID_Ministerio($_REQUEST['id'])[0]->id_min;
        $funcao = $this->Model->carregarID_Ministerio($_REQUEST['id'])[0]->funcao;
        $outra_funcao = $this->Model->carregarID_Ministerio($_REQUEST['id'])[0]->outra_funcao;

        if(isset( $this->Model->carregarID_Ministerio($_REQUEST['id'])[1])){
            $id_min2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->id_min;
            $minist2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->ministerio;
            $funcao2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->funcao;
            $outra_funcao2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->outra_funcao;
        }else{
            $id_min2 = ''; $funcao2 = ''; $outra_funcao2='';
        }

        if(isset( $this->Model->carregarID_Ministerio($_REQUEST['id'])[2])){
            $id_min3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->id_min;
            $minist3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->ministerio;
            $funcao3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->funcao;
            $outra_funcao3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->outra_funcao;
        }else{
            $id_min3 = ''; $funcao3 = ''; $outra_funcao3='';
        }

    }else{
        $id_min = ''; $funcao = ''; $outra_funcao='';
        
    }

    if(!empty($this->Model->carregarID_Discipulador($_REQUEST['id'])) ){
    
        $estado_disc = $this->Model->carregarID_Discipulador($_REQUEST['id'])->estado;
        $licalidade_disc = $this->Model->carregarID_Discipulador($_REQUEST['id'])->localidade;
        if(isset($estado_disc)){
            $discipulador = "Discipulador"; $estado_disc="";
        }else{
            $discipulado = '';
        }
        
    }else{
        $situacao = '';
    }

    if(!empty($this->Model->carregarID_Missionario($_REQUEST['id'])) ){
    
        $campo = $this->Model->carregarID_Missionario($_REQUEST['id'])->campo;

    }else{
        $campo = '';
    }

    if(!empty($this->Model->carregarID_Formacao($_REQUEST['id'])) ){
    
        $tipo = $this->Model->carregarID_Formacao($_REQUEST['id'])[0]->tipo;
        $nivel = $this->Model->carregarID_Formacao($_REQUEST['id'])[0]->nivel;
        $instituicao = $this->Model->carregarID_Formacao($_REQUEST['id'])[0]->instituicao;
        $especialidade = $this->Model->carregarID_Formacao($_REQUEST['id'])[0]->especialidade;

        if(isset($this->Model->carregarID_Formacao($_REQUEST['id'])[1])){
            $tipo = $this->Model->carregarID_Formacao($_REQUEST['id'])[1]->tipo;
            $nivel_teo = $this->Model->carregarID_Formacao($_REQUEST['id'])[1]->nivel;
            $instituicao_teo = $this->Model->carregarID_Formacao($_REQUEST['id'])[1]->instituicao;
            $curso_teo = $this->Model->carregarID_Formacao($_REQUEST['id'])[1]->especialidade;
            $outra_instituicao = $this->Model->carregarID_Formacao($_REQUEST['id'])[1]->outra_instituicao;

        }else{
            $nivel_teo = ''; $instituicao_teo = ''; $curso_teo = ''; $outra_instituicao = '';
        }
        
    }else{
        $tipo = ''; $nivel = ''; $instituicao = ''; $especialidade = '';     $curso_teo = '';  $outra_instituicao = '';
    }

    if(!empty($this->Model->carregarID_Campos($_REQUEST['id'])) ){
    
        $id_camp = $this->Model->carregarID_Campos($_REQUEST['id'])[0]->id_camp;
        $local_membrasia = $this->Model->carregarID_Campos($_REQUEST['id'])[0]->localidade;

    }else{
        $id_camp = '';
    }

    if(!empty($this->Model->carregarID_MembrosDiscipulos($_REQUEST['id'])) ){
    
        $id_prof = $this->Model->carregarID_MembrosDiscipulos($_REQUEST['id'])->id_prof;
        $estado_disc = $this->Model->carregarID_MembrosDiscipulos($_REQUEST['id'])->estado;
        $fase = $this->Model->carregarID_MembrosDiscipulos($_REQUEST['id'])->fase;
        $consagracao = $this->Model->carregarID_MembrosDiscipulos($_REQUEST['id'])->consagracao;

    }else{
        $id_prof = ''; $consagracao=''; $estado_disc=''; $fase='';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/main_modal.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/tab-estilo.css">

    <script src="<?php echo($pach)?>javascript/jquery/jquery.js"></script>
    <script src="<?php echo($pach)?>javascript/jquery/jquery.min.js"></script>

    <script src='<?php echo($pach)?>dropdown/jquery-3.2.1.min.js' type='text/javascript'></script>
    <script src='<?php echo($pach)?>dropdown/select2/dist/js/select2.min.js' type='text/javascript'></script>

    <link href='<?php echo($pach)?>dropdown/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
</head>
<body>

    <main>
                <?php                    
                if(isset($_POST['enviar']) OR isset($_GET['cod'])){
                    if(isset($dadosModel[0])){?>
                    <div class="msg" id="mensagem" style="padding: 6px; background-color:red; color:  #fff; font-size:small">                       
                         <img src="<?php echo $pach?>img/error.png" alt="">&nbsp;<?php echo $dadosModel[0];?>
                    </div>
                    <?php  } else{ ?>
                        
                    <div id="mensagem" style="padding: 6px; background-color: green; color: #fff; font-size:small">                       
                        <img src="<?php echo($pach)?>img/save.png" alt="">&nbsp;<?php echo $dadosModel[1]; ?>
                    </div>  
               <?php } }         
                ?>
    <div class="container-completo">
               
            <div  class="title-form">
                <h3><?php if(!isset($_REQUEST['id'])){ echo 'Registar novo membro';} else{echo 'Membro nº '.$dadosModel->ident;} ?></h3>
                <button class="btn-novo" onclick="
                javascript: location.href='<?php echo $pach?>membros'">
                Voltar</button> 
            </div>   
                <div class="tab-header">
                    <button class="btn-tab active" data-target-tab="#pessoais"><img src="<?php echo $pach?>img/user2.png" alt=""><span>Dados Pessoais</span> </button>
                    <button class="btn-tab" data-target-tab="#add"><img src="<?php echo $pach?>img/location.png" alt=""><span>Adicionais</span> </button>
                    <button class="btn-tab" data-target-tab="#memb"><img src="<?php echo $pach?>img/membrasia.png" alt=""><span>Membrasia</span> </button>
                    <button class="btn-tab" data-target-tab="#min"><img src="<?php echo $pach?>img/min.png" alt=""><span> Ministérios</span> </button>
                    <button class="btn-tab" data-target-tab="#financ"><img src="<?php echo $pach?>img/finanças.png" alt=""><span>Formação e Finanças</span> </button>
                    <button class="btn-tab" data-target-tab="#foto"><img src="<?php echo $pach?>img/image1.png" alt=""><span>Carregar Foto</span> </button>
                </div>

                    <form action="<?php echo $pach?>membros/cadastrar" method="POST" enctype="multipart/form-data" class="form">

                    <div class="tab-body">
                               <!--TAB MEDADOS PESSOAIS-->
                               <div class="tab-content active" id="pessoais">
                           
                                   <div class="user-details">    
                                   
   
                                       <div class="input-box">
                                           <input type="hidden" name="id_mem" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_mem ?>">
                                           <span class="details">Nome completo *</span>
                                           <input type="text" name="nome" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->nome ?>" placeholder="Ex: Pedro José" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Situação *</span>
                                           <select name="estado" id="" class="dropdown" required>
                                               <option value="">Selecione</option>
                                               <option value="Comunhão" <?php if(isset($_REQUEST['id'])) echo 'Comunhão' == $dadosModel->estado ? 'selected' : '' ?>>Comunhão</option>                            
                                               <option value="Disciplina" <?php if(isset($_REQUEST['id'])) echo 'Disciplina' == $dadosModel->estado ? 'selected' : '' ?>>Disciplina</option>
                                               <option value="Transferido" <?php if(isset($_REQUEST['id'])) echo 'Transferido' == $dadosModel->estado ? 'selected' : '' ?>>Transferido</option>
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Gênero *</span>
                                           <select name="genero" id="" class="dropdown" required>
                                               <option value="">Selecione</option>
                                               <option value="Masculino" <?php if(isset($_REQUEST['id'])) echo 'Masculino' == $dadosModel->genero ? 'selected' : '' ?>>Masculino</option>
                                               <option value="Feminino" <?php if(isset($_REQUEST['id'])) echo 'Feminino' == $dadosModel->genero ? 'selected' : '' ?>>Feminino</option>                            
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">BI nº *</span>
                                           <input type="text" name="identidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->identidade ?>" placeholder="Nº de identidade" minlength="14" maxlength="14" required>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Data de validade</span>
                                           <input type="date" name="data_val" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_val ?>" placeholder="Observação">
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Data de nascimento *</span>
                                           <input type="date" name="data_nasc" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_nasc ?>" placeholder="Ex: 19/02/1990" required>
                                       </div>  
   
                                       <div class="input-box">
                                           <span class="details">Naturalidade *</span>
                                           <input type="text" name="naturalidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->naturalidade ?>" placeholder="Ex: ">
                                       </div>
   
   
                                       <div class="input-box">
                                           <span class="details">Província *</span>
                                           <input type="text" name="provincia" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->provincia ?>" placeholder="Ex: Uíge" required>
                                       </div>
   
                                                                                                
                                       <div class="input-box">
                                           <span class="details">Nome do pai</span>
                                           <input type="text" name="pai" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->pai ?>" placeholder="João Fernando">
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Nome da mãe</span>
                                           <input type="text" name="mae" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->mae ?>" placeholder="Ex: Maria José">
                                       </div>
   
   
                                       <div class="input-box">
                                           <span class="details">Estado civil *</span>
                                           <select name="esta_civil" id="esta_civil" class="dropdown" onchange="habilitarCampos()"  required>
                                               <option value="">Selecione</option>
                                               <option value="Solteiro" <?php if(isset($_REQUEST['id'])) echo 'Solteiro' == $dadosModel->esta_civil ? 'selected' : '' ?>>Solteiro</option>
                                               <option value="Casado" <?php if(isset($_REQUEST['id'])) echo 'Casado' == $dadosModel->esta_civil ? 'selected' : '' ?>>Casado</option>                            
                                               <option value="Amaritado" <?php if(isset($_REQUEST['id'])) echo 'Amaritado' == $dadosModel->esta_civil ? 'selected' : '' ?>>Amaritado</option>
                                               <option value="Viúvo" <?php if(isset($_REQUEST['id'])) echo 'Viúvo' == $dadosModel->esta_civil ? 'selected' : '' ?>>Viúvo</option>                            
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Conjuge</span>
                                           <input type="text" id="conjuge" name="conjuge" value="<?php if(isset($_REQUEST['id'])) echo $conjuge ?>" placeholder=" Nome do parceiro (a)" disabled>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Tipo Casamento</span>
                                           <select name="tipo_cas" id="tipo_casa" class="dropdown" disabled>
                                               <option value="">Selecione</option>
                                               <option value="Civil" <?php if(isset($_REQUEST['id'])) echo 'Civil' == $tipo_cas ? 'selected' : '' ?>>Civil</option>
                                               <option value="Religioso" <?php if(isset($_REQUEST['id'])) echo 'Religioso' == $tipo_cas ? 'selected' : '' ?>>Religioso</option>
                                               <option value="Ambos" <?php if(isset($_REQUEST['id'])) echo 'Ambos' == $tipo_cas ? 'selected' : '' ?>>Ambos</option>
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Data de casamento</span>
                                           <input type="date" id="data_casa" name="data_cas" value="<?php if(isset($_REQUEST['id'])) echo $data_cas ?>" disabled>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Nº de filhos</span>
                                           <input type="Number" name="num_filhos" value="<?php if(isset($_REQUEST['id'])){ echo $num_filhos; }else{ echo '0';} ?>" min="0" placeholder="Ex: 05" >
                                       </div>
                                                                                               
                                   </div>  
                               </div> 
   
                                <!--TAB ADICIONAIS-->
                               <div class="tab-content" id="add">
   
                                   <div class="user-details">
   
                                       <div class="input-box">
                                           <span class="details">Telefone</span>
                                           <input type="text" name="telefone" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->telefone ?>" placeholder="Ex: 937958473" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Telefone Alternativo</span>
                                           <input type="text" name="tel_emerg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->tel_emerg ?>" placeholder="Ex: 994579374" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Email</span>
                                           <input type="text" name="email" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->email ?>" placeholder="Ex: exemlo@gmail.com" >
                                       </div> 
   
                                       <div class="input-box">
                                           <span class="details">Bairro *</span>
                                           <input type="text" name="bairro" value="<?php if(isset($_REQUEST['id'])) echo  $bairro ?>" placeholder="Ex: Dunga" required>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Zona nº</span>
                                           <input type="number" name="zona" value="<?php if(isset($_REQUEST['id'])){echo $zona;}else{echo '0';}  ?>" min="0" placeholder="Ex: 04" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Quarteirão/Quadra</span>
                                           <input type="Number" name="quarteirao" value="<?php if(isset($_REQUEST['id'])){ echo $quarteirao; }else{ echo '0';} ?>"min="0" placeholder="Ex: 05" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Rua</span>
                                           <input type="text" name="rua" value="<?php if(isset($_REQUEST['id'])) echo $rua ?>" placeholder="Ex: A" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Casa nº</span>
                                           <input type="text" name="casa" value="<?php if(isset($_REQUEST['id'])){echo $casa;}else{echo 's/n';}  ?>" placeholder="Ex: 042" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Ponto de referência</span>
                                           <input type="text" name="ponto_ref" value="<?php if(isset($_REQUEST['id'])) echo $ponto_ref ?>" placeholder="Ex: Posto de Médico" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Agregado </span>
                                           <input type="Number" name="agregado" value="<?php if(isset($_REQUEST['id'])){ echo $agregado; }else{ echo '0';} ?>" placeholder="Ex: 05" >
   
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Estatus</span>
                                           <select name="estatus" id="estatus" class="dropdown" onchange="habilitarCampos()">
                                               <option value="">Selecione</option>
                                               <option value="Pai" <?php if(isset($_REQUEST['id'])) echo 'Pai' == $estatus ? 'selected' : '' ?>>Pai</option>                            
                                               <option value="Mãe" <?php if(isset($_REQUEST['id'])) echo 'Mãe' == $estatus ? 'selected' : '' ?>>Mãe</option>
                                               <option value="Filho(a)" <?php if(isset($_REQUEST['id'])) echo 'Filho(a)' == $estatus ? 'selected' : '' ?>>Filho(a)</option>
                                               <option value="Irmão(a)" <?php if(isset($_REQUEST['id'])) echo 'Irmão(a)' == $estatus ? 'selected' : '' ?>>Irmão (a)</option>
                                               <option value="Tio(a)" <?php if(isset($_REQUEST['id'])) echo 'Tio(a)' == $estatus ? 'selected' : '' ?>>Tio(a)</option>
                                               <option value="Sobrinho(a)" <?php if(isset($_REQUEST['id'])) echo 'Sobrinho(a)' == $estatus ? 'selected' : '' ?>>Sobrinho(a)</option>                            
                                               <option value="Primo(a)" <?php if(isset($_REQUEST['id'])) echo 'Primo(a)' == $estatus ? 'selected' : '' ?>>Primo(a)</option>
                                               <option value="Avó" <?php if(isset($_REQUEST['id'])) echo 'Avó' == $estatus ? 'selected' : '' ?>>Avó</option>
                                               <option value="Neto(a)" <?php if(isset($_REQUEST['id'])) echo 'Neto(a)' == $estatus ? 'selected' : '' ?>>Neto(a)</option>
                                               <option value="Responsavel" <?php if(isset($_REQUEST['id'])) echo 'Responsavel' == $estatus ? 'selected' : '' ?>>Responsavel</option>  
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Grupo sanguínio</span>
                                           <input type="text" name="grupo_sang" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->grupo_sang ?>" placeholder="Ex: O+" >
                                       </div>
                                                                   
   
                                   </div>
                               </div>
   
                               <!--TAB MEMBRASIA-->
                               <div class="tab-content" id="memb">
   
                                   <div class="user-details" id="tab_memb">
   
                                       <div class="input-box">
                                           <span class="details">Tipo de membrasia *</span>
                                           <select name="tipo_memb" id="tipo_memb" class="dropdown" onchange="habilitarCampos()" required>
                                               <option value="">Selecione</option>
                                               <option value="Baptismo" <?php if(isset($_REQUEST['id'])) echo 'Baptismo' == $tipo_memb ? 'selected' : '' ?>>Baptismo</option>
                                               <option value="Aclamação" <?php if(isset($_REQUEST['id'])) echo 'Aclamação' == $tipo_memb ? 'selected' : '' ?>>Aclamação</option> 
                                               <option value="Transferência" <?php if(isset($_REQUEST['id'])) echo 'Transferência' == $tipo_memb ? 'selected' : '' ?>>Transferência</option>                            
                               
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Local de membrasia *</span>
                                           <select name="id_camp" id="" class="dropdown" required>
                                               <option value="">Selecione</option>
                                               <option value= "Igreja local" <?php if(isset($_REQUEST['id']) && isset($id_camp)) echo 'Igreja local' == 'Igreja local' ? 'selected' : '' ?>>Igreja local</option>
                                               <?php 
                                               foreach($this->Model->carregarCampos() as $row){?>          
                                                   <option value="<?php echo $row->id_camp; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_camp == $id_camp ? 'selected' :'' ?>>  <?php echo $row->localidade; ?></option> 
   
                                               <?php } ?>    
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Local de baptismo </span>
                                           <select name="local_bap" id="local_bat" class="dropdown" onchange="habilitarCampos()">
                                               <option value="">Selecione</option>
                                               <option value= "Igreja local" <?php if(isset($_REQUEST['id'])) echo 'Igreja local' == $local_bap ? 'selected' : '' ?> >Igreja local</option>
                                               <?php 
                                               foreach($this->Model->carregarCampos() as $row){?>          
                                                   <option value="<?php echo $row->localidade; ?>"<?php  if(isset($_REQUEST['id'])) 
                                                   echo $row->localidade == $local_bap ? 'selected' :'' ?>>  <?php echo $row->localidade; ?></option> 
                                               <?php } ?> 
                                               <option value= "Outro" <?php if(isset($_REQUEST['id'])) echo 'Outro' == $local_bap ? 'selected' : '' ?> >Outro</option>   
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Data *</span>
                                           <input type="date" name="data_bap" id="data_bat" onchange="" value="<?php if(isset($_REQUEST['id'])) echo  $data_bap ?>" placeholder="Ex: 12/04/2013" required>
                                       </div>
                                       <div class="input-box">
                                           <span class="details">Data de recepção*</span>
                                           <input type="date" name="data_recep" id="data_bat" onchange="" value="<?php if(isset($_REQUEST['id'])) echo  $data_recep ?>" placeholder="Ex: 12/04/2013" required>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Pastor</span>
                                           <input type="text" name="ministro" value="<?php if(isset($_REQUEST['id'])) echo $ministro ?>" placeholder="Nome do ministro celebrante" >
                                       </div>
   
                                       <div class="input-box">
                                           <div>
                                               <span class="details">Igreja de proveniência</span>
                                               <input type="text" id="igreja_prov"  name="proven" id="proveniencia" value="<?php if(isset($_REQUEST['id'])) echo $proven  ?>" placeholder="Nome da igreja" disabled>
   
                                           </div>
                                       </div> 
   
                                       <div class="input-box">
                                           <span class="details">Área de dicipulado</span>
                                           <select name="classe_disc" id="area_discipulado" class="dropdown" onchange="habilitarCampos()">
                                               <option value="">Selecione</option>
                                               <option value="Professor" <?php if(isset($_REQUEST['id'])) echo 'Professor' ==  $discipulador ? 'selected' : '' ?>>Professor</option>
                                               <option value="Aluno" <?php if(isset($_REQUEST['id'])) echo 'Aluno' == '' ? 'selected' : '' ?>>Aluno</option>
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Local de discipulado</span>
                                           <select name="localidade_disc" id="localidade_disc" class="dropdown">
                                               <option value="">Selecione</option>
                                               <option value= "Igreja local" <?php if(isset($_REQUEST['id'])) echo 'Igreja local' == $localidade_disc ? 'selected' : '' ?> >Igreja local</option>
                                               <?php 
                                               foreach($this->Model->carregarCampos() as $row){?>          
                                                   <option value="<?php echo $row->localidade; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->localidade == $licalidade_disc ? 'selected' :'' ?>>  <?php echo $row->localidade; ?></option> 
                                               <?php } ?> 
                                           </select>
                                       </div>       
   
                                       <div class="input-box">
                                           <span class="details">Fase</span>
                                           <select name="fase" id="fase" class="dropdown" >
                                               <option value="">Selecione</option>
                                               <option value= "1ª Fase" <?php if(isset($_REQUEST['id'])) echo '1ª Fase' == $fase ? 'selected' : '' ?> >1ª Fase</option>
                                               <option value="2ª Fase" <?php if(isset($_REQUEST['id'])) echo '2ª Fase' == $fase ? 'selected' : '' ?> >2ª Fase</option>
                                               <option value="3ª Fase" <?php if(isset($_REQUEST['id'])) echo '3ª Fase' == $fase ? 'selected' : '' ?> >3ª Fase</option>
                                               <option value="4ª Fase" <?php if(isset($_REQUEST['id'])) echo '4ª Fase' == $fase ? 'selected' : '' ?> >4ª Fase</option>
                                           </select> 
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Situação</span>
                                           <select name="estado_disc" id="situacao"  class="dropdown" >
                                               <option value="">Selecione</option>
                                               <option value="Regular" <?php if(isset($_REQUEST['id'])) echo 'Regular' == $estado_disc ? 'selected' : '' ?>>Regular</option>
                                               <option value="Irregular" <?php if(isset($_REQUEST['id'])) echo 'Irregular' == $estado_disc ? 'selected' : '' ?>>Irregular</option>
                                               <option value="Desistente" <?php if(isset($_REQUEST['id'])) echo 'Desistente' == $estado_disc ? 'selected' : '' ?>>Desistente</option>                                                        
                                               <option value="Reentegrado" <?php if(isset($_REQUEST['id'])) echo 'Reentegrado' == $estado_disc ? 'selected' : '' ?>>Reentegrado</option>
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Consagração</span>
                                           <select name="consagracao" id="consagracao" class="dropdown" disabled>
                                               <option value="Não" <?php if(isset($_REQUEST['id'])) echo 'Não' == $consagracao ? 'selected' : '' ?> >Não</option>
                                               <option value="Sim" <?php if(isset($_REQUEST['id'])) echo 'Sim' == $consagracao ? 'selected' : '' ?>>Sim</option>
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Professor </span>
                                           <select name="id_prof" id="professor" class="dropdown" style="width: 100%;" disabled>
                                               <option value="">Selecione</option>      
                                               <?php 
                                               foreach($this->Model->carregarDiscipuladores() as $row){?>          
                                                   <option value="<?php echo $row->id_discip; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_discip == $id_prof ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 
   
                                               <?php } ?>    
                                           </select>
                                       </div>
   
                                   </div>
                               </div>
   
                                <!--TAB MINISTÉRIO-->
                               <div class="tab-content" id="min">
                                   <div class="user-details" id="tab_min">
   
                                       <div class="input-box">
                                           <span class="details">Ministério 1</span>
                                           <select name="id_min" id="ministerio1" class="dropdown" style='width: 100%;'>
                                               <option value="">Selecione</option>
                                               <?php 
                                               foreach($this->Model->carregarMinisterios() as $row){?>          
                                                   <option value="<?php echo $row->id_min; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_min == $id_min ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 
   
                                               <?php } ?>  
                                               <option value= "Nenhum" <?php if(isset($_REQUEST['id'])) echo 'Nenhum' == $dadosModel->localidade ? 'selected' : '' ?> >Nenhum</option>  
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Função</span>
                                           <select name="funcao" id="funcao" class="dropdown" onchange="habilitarCampos()">
                                               <option value="">Selecione</option>
                                               <option value="Líder" <?php if(isset($_REQUEST['id'])) echo 'Líder' == $funcao ? 'selected' : '' ?>>Líder</option>
                                               <option value="Membro" <?php if(isset($_REQUEST['id'])) echo 'Membro' == $funcao ? 'selected' : '' ?>>Membro</option>
                                               <option value="Outra" <?php if(isset($_REQUEST['id'])) echo 'Outra' == $funcao ? 'selected' : '' ?>>Outra</option>                                                        
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Outra função</span>
                                           <input type="text"  name="outra_funcao" id="outra_func" value="<?php if(isset($_REQUEST['id'])) echo $outra_funcao ?>" placeholder="Outra função" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Ministério 2</span>
                                           <select name="id_min2" id="ministerio2" class="dropdown" style='width: 100%;'>
                                               <option value="">Selecione</option>
                                               <?php 
                                               foreach($this->Model->carregarMinisterios() as $row){?>          
                                                   <option value="<?php echo $row->id_min; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_min2 == $id_min ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 
   
                                               <?php } ?>  
                                               <option value= "Nenhum" <?php if(isset($_REQUEST['id'])) echo 'Nenhum' == $dadosModel->localidade ? 'selected' : '' ?> >Nenhum</option>  
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Função</span>
                                           <select name="funcao2" id="funcao" class="dropdown" onchange="habilitarCampos()">
                                               <option value="">Selecione</option>
                                               <option value="Líder" <?php if(isset($_REQUEST['id'])) echo 'Líder' == $funcao2 ? 'selected' : '' ?>>Líder</option>
                                               <option value="Membro" <?php if(isset($_REQUEST['id'])) echo 'Membro' == $funcao2 ? 'selected' : '' ?>>Membro</option>
                                               <option value="Outra" <?php if(isset($_REQUEST['id'])) echo 'Outra' == $funcao2 ? 'selected' : '' ?>>Outra</option>                                                        
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Outra função</span>
                                           <input type="text"  name="outra_funcao2" id="outra_func" value="<?php if(isset($_REQUEST['id'])) echo $outra_funcao2 ?>" placeholder="Outra função" >
                                       </div>
                                       
                                       <div class="input-box">
                                           <span class="details">Ministério 3</span>
                                           <select name="id_min3" id="ministerio3" class="dropdown" style='width: 100%;'>
                                               <option value="">Selecione</option>
                                               <?php 
                                               foreach($this->Model->carregarMinisterios() as $row){?>          
                                                   <option value="<?php echo $row->id_min; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_min == $id_min3 ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 
   
                                               <?php } ?>  
                                               <option value= "Nenhum" <?php if(isset($_REQUEST['id'])) echo 'Nenhum' == $dadosModel->localidade ? 'selected' : '' ?> >Nenhum</option>  
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Função</span>
                                           <select name="funcao3" id="funcao3" class="dropdown" onchange="habilitarCampos()">
                                               <option value="">Selecione</option>
                                               <option value="Líder" <?php if(isset($_REQUEST['id'])) echo 'Líder' == $funcao3 ? 'selected' : '' ?>>Líder</option>
                                               <option value="Membro" <?php if(isset($_REQUEST['id'])) echo 'Membro' == $funcao3? 'selected' : '' ?>>Membro</option>
                                               <option value="Outra" <?php if(isset($_REQUEST['id'])) echo 'Outra' == $funcao3 ? 'selected' : '' ?>>Outra</option>                                                        
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Outra função</span>
                                           <input type="text"  name="outra_funcao3" id="outra_func2" value="<?php if(isset($_REQUEST['id'])) echo $outra_funcao3 ?>" placeholder="Outra função" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Missionário &nbsp;<input class="checkbox" id="checkbox" type="checkbox" onchange="checkar()" ></span>    
                                           <select name="id_campo_miss" id="missionario" class="dropdown" disabled>
                                               <option value="">Selecione</option>
                                               <?php 
                                               foreach($this->Model->carregarCampos() as $row){?>          
                                                   <option value="<?php echo $row->id_camp; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->localidade == $campo ? 'selected' :'' ?>>  <?php echo $row->localidade; ?></option> 
   
                                               <?php } ?>  
                                           </select>
                                       </div>
   
                                   </div>
                               </div>
   
                                <!--TAB FINANÇAS-->
                               <div class="tab-content" id="financ">
                                   <div class="user-details">
   
                                       <div class="input-box">
                                           <span class="details">Nível académico </span>
                                           <select name="nivel" id="" class="dropdown">
                                               <option value="">Selecione</option>
                                               <option value="Técnico Básico" <?php if(isset($_REQUEST['id'])) echo 'Técnico Básico' == $nivel ? 'selected' : '' ?>>Técnico Básico</option>
                                               <option value="Técnico Médio" <?php if(isset($_REQUEST['id'])) echo 'Técnico Médio' == $nivel ? 'selected' : '' ?>>Técnico Médio</option>
                                               <option value="Técnico Superior" <?php if(isset($_REQUEST['id'])) echo 'Técnico Superior' == $nivel ? 'selected' : '' ?>>Técnico Superior</option>  
                                           </select>
                                       </div>
                                      
                                       <div class="input-box">
                                           <span class="details">Área de formação </span>
                                           <input type="text" name="especialidade" value="<?php if(isset($_REQUEST['id'])) echo $especialidade ?>" placeholder="Ex: Médica" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Instituição </span>
                                           <input type="text" name="instituicao" value="<?php if(isset($_REQUEST['id'])) echo $instituicao ?>" placeholder="Ex: Instituto Superior de Ciências Médicas" >
                                       </div>
   
   
                                       <div class="input-box">
                                           <span class="details">Formação teológica</span>
                                           <input type="text" name="curso_teo" value="<?php if(isset($_REQUEST['id'])) echo $curso_teo ?>" placeholder="Ex: Teologia Filosófica" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Nível</span>
                                           <select name="nivel_teo" id="" class="dropdown">
                                               <option value="">Selecione</option>
                                               <option value="Básico" <?php if(isset($_REQUEST['id'])) echo 'Básico' == $nivel_teo ? 'selected' : '' ?>>Básico</option>
                                               <option value="Médio" <?php if(isset($_REQUEST['id'])) echo 'Médio' == $nivel_teo ? 'selected' : '' ?>>Médio</option>
                                               <option value="Avançado" <?php if(isset($_REQUEST['id'])) echo 'Avançado' == $nivel_teo ? 'selected' : '' ?>>Avançado</option>
                                               <option value="Superior" <?php if(isset($_REQUEST['id'])) echo 'Superior' == $nivel_teo ? 'selected' : '' ?>>Superior</option>                            
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Instituição</span>
                                           <select name="instituicao_teo" id="" class="dropdown">
                                               <option value="">Selecione</option>
                                               <option value="ITBU" <?php if(isset($_REQUEST['id'])) echo 'ITBU' == $instituicao_teo ? 'selected' : '' ?>>ITBU</option>
                                               <option value="CTIC" <?php if(isset($_REQUEST['id'])) echo 'CTIC' == $instituicao_teo ? 'selected' : '' ?>>CTIC</option>
                                               <option value="Outra" <?php if(isset($_REQUEST['id'])) echo 'Outra' == $instituicao_teo ? 'selected' : '' ?>>Outra</option>                            
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Outra instituição</span>
                                           <input type="text"  name="outra_instituicao" value="<?php if(isset($_REQUEST['id']))  echo $outra_instituicao ?>" placeholder="Ex: CTIC" >
                                       </div>
   
   
                                       <!--FINANÇAS-->
                                       <div class="input-box">
                                           <span class="details">Profissão</span>
                                           <input type="text" name="profissao" value="<?php if(isset($_REQUEST['id'])) echo $profissao ?>" placeholder="Ex: Professor" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Sector</span>
                                           <select name="sector" id="sector" class="dropdown" onchange="habilitarCampos()">
                                               <option value="">Selecione</option>
                                               <option value="Público" <?php if(isset($_REQUEST['id'])) echo 'Público' == $sector ? 'selected' : '' ?>>Público</option>
                                               <option value="Privado" <?php if(isset($_REQUEST['id'])) echo 'Privado' == $sector ? 'selected' : '' ?>>Privado</option>
                                               <option value="Independente" <?php if(isset($_REQUEST['id'])) echo 'Independente' == $sector ? 'selected' : '' ?>>Independente</option>                            
                                           </select>
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Compromisso de dízimo</span>
                                           <input type="text" name="dizimo" value="<?php if(isset($_REQUEST['id'])) echo $dizimo ?>" placeholder="Compromisso de dízimo/primícias  Ex: 5000" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Ramo de actividade</span>
                                           <input type="text"  id="ramo_activ" name="ramo_activ" value="<?php if(isset($_REQUEST['id'])) echo $ramo_activ ?>" placeholder="Ex: Venda a retallho" >
                                       </div>
   
                                       <div class="input-box">
                                           <span class="details">Local de serviço</span>
                                           <input type="text"  id="local_servico" name="local_servico" value="<?php if(isset($_REQUEST['id'])) echo $local_servico ?>" placeholder="Ex: Negage" >
                                       </div>
      
                                   </div>
                                   <!--
                                   <div>
                                       <button onclick="showPanel(4)" class="btnTab btn-novo">Próximo</button>   
                                    </div> -->
                               </div>  
                                <!--TAB FOTOS-->
                               <div class="tab-content" id="foto">
                                   <div class="image-box">
   
                                       <div class="input-box">
                                           <?php if(isset($_REQUEST['id']) &&  !empty($dadosModel->foto)){?>
                                               <img src="<?php echo $pach.'img/fotos/'.$dadosModel->foto; ?>" alt="" width="200px" height="230px" class="imagem" style="background-color: #ccc;"> 
                                                <input type="text" name="foto_visualizada" value="<?php echo $dadosModel->foto ?>"> 
                                           <?php } else{?>
                                               
                                               <img src="<?php echo $pach.'img/image.png'?>" alt="" width="200px" height="200px" class="imagem" style="background-color: #ccc;"> 
   
                                               <?php 
                                           }?>
                                       </div>
   
                                       <div>                                   
                                           <input type="file"  name="arquivo" id="imagem" 
                                            value="<?php if(isset($_REQUEST['id']) &&  !empty($dadosModel->foto)){ 
                                                echo $dadosModel->foto;
                                            }  ?> " onchange="previewImagem()">
                                       </div>
   
                                   </div>
                               </div> 
                               
                           </div>                           
                        <div>
                            <input type="submit" value="Salvar" name="enviar" class="btn-form">
                        </div>                                    
                    </form>
                        
            </div>
        </main>

        <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#ministerio1").select2();
            $("#ministerio2").select2();
            $("#ministerio3").select2();
            $("#professor").select2();

            /*// Read selected option
            $('#but_read').click(function(){
                var username = $('#selUser option:selected').text();
                var userid = $('#selUser').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });*/
        });
        </script>
        

        <script>
            const btns = document.querySelectorAll(".btn-tab");

            btns.forEach((btn) => {
                btn.addEventListener('click', () => {

                    btns.forEach((btn) => btn.classList.remove("active"));

                    btn.classList.add("active");
                    const tabContents = document.querySelectorAll('.tab-content')
                    tabContents.forEach((tabContents) => {
                        tabContents.className = tabContents.className.replace("active", "");
                    });

                    document.querySelector(btn.dataset.targetTab).classList.add("active");
                });
            });
            
            function previewImagem(){
                var imagem = document.querySelector('input[name=arquivo]').files[0];
                var preview = document.querySelector('.imagem');

                var reader = new FileReader();

                reader.onloadend = function(){
                    preview.src = reader.result;
                }
                if(imagem){
                    reader.readAsDataURL(imagem);
                }else{
                    preview.src = "img/image.png";
                }

            }

            function anos_membrasia(){

                var data_bat = document.querySelector('#data_bat').innerHTML;
                var tempo = document.querySelector('#tempo_bat');

            }
            function habilitarCampos(){
                   
                   const area_discipulado = document.querySelector('#area_discipulado');
                   const professor = document.querySelector('#professor');
                   const consagracao = document.querySelector('#consagracao');
                   const localidade_disc = document.querySelector('#localidade_disc');
                   const fase = document.querySelector('#fase');
                   const situacao = document.querySelector('#situacao');

                   if(area_discipulado.value == "Aluno"){
   
                       professor.disabled = false;
                       consagracao.disabled = false;
                   }
                   else{
                       professor.value = null;
                       consagracao.value = 'Não';
                       professor.disabled = true;
                       consagracao.disabled = true;
                       
                   }

                   const esta_civil = document.querySelector('#esta_civil');
                   const conjuge = document.querySelector('#conjuge');
                   const tipo_casa = document.querySelector('#tipo_casa');
                   const data_casa = document.querySelector('#data_casa');

                   if(esta_civil.value == "Casado" || esta_civil.value == "Amaritado"){
   
                        conjuge.disabled = false;
                        tipo_casa.disabled = false;
                        data_casa.disabled = false;
                    }
                    else{
                        conjuge.disabled = true;
                        tipo_casa.disabled = true;
                        data_casa.disabled = true;
                    }

                    const tipo_memb = document.querySelector('#tipo_memb');
                    const local_bat = document.querySelector('#local_bat');
                    const igreja_prov = document.querySelector('#igreja_prov');

                    if(tipo_memb.value == "Transferência"){   
                        igreja_prov.disabled = false;
                    }
                    else{
                        igreja_prov.disabled = true;
                    }

                    if(local_bat.value == "Outro"){   
                        igreja_prov.disabled = false;
                    }
                    else{
                        igreja_prov.disabled = true;
                    }
   
               }
        </script>
        <script>
            function checkar(){
                var checkbox = document.querySelector('#checkbox').checked;
                var cmbMissio = document.querySelector('#missionario');

                if(checkbox == true){
                    cmbMissio.disabled = false;
                }else{
                    cmbMissio.disabled = true;
                }
            }
            
        </script>
    </div>
</body>
</html>