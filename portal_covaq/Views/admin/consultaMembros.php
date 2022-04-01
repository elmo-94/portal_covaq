<?php include 'config.php'; 

if(isset($_POST['texto'])){

    if(!empty($this->Model->carregarID_Membrasia($dados2->id_mem ))){

        $tipo_memb = $this->Model->carregarID_Membrasia($dados2->id_mem )->tipo_memb;
        $data_bap = $this->Model->carregarID_Membrasia($dados2->id_mem)->data_bap;
        //print_r($data_bap);exit;
        $ministro = $this->Model->carregarID_Membrasia($dados2->id_mem )->ministro;
        $tempo = $this->Model->carregarID_Membrasia($dados2->id_mem )->tempo;
        $local_bap = $this->Model->carregarID_Membrasia($dados2->id_mem )->local_bap;
    }else{
        $data_bap = ''; $ministro = ''; $tempo = ''; $local_bap = '';  $tipo_memb ="";
    }
/*
    if(!empty($this->Model->carregarID_Financas($_REQUEST['id'])) ){
    
        $profissao = $this->Model->carregarID_Financas($_REQUEST['id'])->profissao;
        $sector = $this->Model->carregarID_Financas($_REQUEST['id'])->sector;
        $ramo_activ = $this->Model->carregarID_Financas($_REQUEST['id'])->ramo_activ;
        $dizimo = $this->Model->carregarID_Financas($_REQUEST['id'])->dizimo;
    }else{
        $profissao = ''; $sector = ''; $ramo_activ = ''; $dizimo = '';
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
    }else{
        $agregado = ''; $num_filhos = ''; $estatus = ''; $conjuge = '';
    }

    if(!empty($this->Model->carregarID_Ministerio($_REQUEST['id'])) ){
    
        $id_min = $this->Model->carregarID_Ministerio($_REQUEST['id'])[0]->id_min;
        $minist = $this->Model->carregarID_Ministerio($_REQUEST['id'])[0]->ministerio;
        $funcao = $this->Model->carregarID_Ministerio($_REQUEST['id'])[0]->funcao;

        if(isset( $this->Model->carregarID_Ministerio($_REQUEST['id'])[1])){
            $id_min2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->id_min;
            $minist2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->ministerio;
            $funcao2 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[1]->funcao;
        }

        if(isset( $this->Model->carregarID_Ministerio($_REQUEST['id'])[2])){
            $id_min3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->id_min;
            $minist3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->ministerio;
            $funcao3 = $this->Model->carregarID_Ministerio($_REQUEST['id'])[2]->funcao;
        }

    }else{
        $id_min = ''; $funcao = ''; $minist='';
        $id_min3=''; $minist3='';   $minist3='';
        $id_min2=''; $minist2='';   $funcao2='';
    }

    if(!empty($this->Model->carregarID_Discipulador($_REQUEST['id'])) ){
    
        $estado = $this->Model->carregarID_Discipulador($_REQUEST['id'])->estado;
        if(isset($estado)){
            $discipulado = "Discipulador";
        }
        
    }else{
        $situacao = '';
    }

    if(!empty($this->Model->carregarID_Missionario($_REQUEST['id'])) ){
    
        $id_camp = $this->Model->carregarID_Missionario($_REQUEST['id'])->id_camp;

    }else{
        $id_camp = '';
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
        }
        
    }else{
        $tipo = ''; $nivel = ''; $instituicao = ''; $especialidade = '';
        $nivel_teo = ''; $instituicao_teo = ''; $curso_teo = '';
    }

    if(!empty($this->Model->carregarID_Campos($_REQUEST['id'])) ){
    
        $id_camp = $this->Model->carregarID_Campos($_REQUEST['id'])[0]->id_camp;

    }else{
        $id_camp = '';
    }
*/
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
    <link rel="stylesheet" href="<?php echo($pach)?>style/buscar_membro.css">

    <script src="<?php echo($pach)?>javascript/jquery/jquery.js"></script>
    <script src="<?php echo($pach)?>javascript/jquery/jquery.min.js"></script>
    <script src="<?php echo($pach)?>javascript/validarCampos.js"></script>

    <script src='<?php echo($pach)?>dropdown/jquery-3.2.1.min.js' type='text/javascript'></script>
    <script src='<?php echo($pach)?>dropdown/select2/dist/js/select2.min.js' type='text/javascript'></script>

    <link href='<?php echo($pach)?>dropdown/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
    
    
</head>

<body>

    <main>
            <?php 
                     
                     if(isset($dadosModel[1])){
            ?>
                        <div class="msg" id="mensagem" style="padding: 6px; background-color:green; color:  #fff; font-size:small">                       
                            <img src="<?php echo $pach?>img/save.png" alt="">&nbsp;<?php echo $dadosModel[1];?>
                        </div>
            <?php  } 
                    else if(!empty($dadosModel[2])){ ?>
                        <div id="mensagem" style="padding: 6px; background-color: green; color: #fff; font-size:small">                       
                            <img src="<?php echo $pach?>img/save.png" alt="">&nbsp;<?php echo 'Alteração efectuada com sucesso !'; ?>
                        </div>  
           <?php } ?>
        <div class="container-completo">
               
            <div  class="title-form">
                <h3><?php if(isset($dadosModel[1])){ echo 'Dados do membro';} else{echo 'Consultar';} ?></h3>
                <button class="btn-novo" onclick="
                javascript: location.href='<?php echo $pach?>home'">
                Voltar</button> 
            </div>
            <?php if(!isset($dadosModel[1])){ ?>
            <div class="card-body-busca">
                <form class="form-busca" method="POST" action="<?php echo($pach)?>membros/consultar">
                    <input type="text" class="txt-buscar" id="buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['texto']; ?>" name="texto" placeholder="Nº do bilhete">                     
                    <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                </form>                                  
            </div> 
            <?php } ?>  
            <?php if(isset($_POST['texto'])){
                if(!empty($dados2)){?>
                    <div> 
                            <table border="1px" class="table-resultado">
                                <thead class="thead">
                                    <tr> 
                                        <th>Resultado</th>
                                    </tr>
                                </thead>
                                <tbody class="tbody">
                                    <tr><td>Código: <?= $dados2->ident?></td></tr>
                                    <tr><td>Nome: <?= $dados2->nome?></td></tr>
                                    <tr><td>Bilhete: <?= $dados2->identidade?></td></tr>
                                    <tr><td>Gênero: <?= $dados2->genero?></td></tr>
                                    <tr><td>Estado Civil: <?= $dados2->esta_civil?></td></tr>
                                    <tr></tr>
                                    <tr><td>Local de membrasia: <?= $local_bap?></td></tr>
                                    <tr><td>Membro por: <?= $tipo_memb?></td></tr>
                                    <tr><td>Data de Baptismo: <?= $data_bap?></td></tr>
                                    <tr><td>Tempo de membrasia: <?= $tempo.' Anos'?></td></tr>
                                </tbody>
                            </table>
                            
                            <div>
                                <a href="<?php echo $pach?>membros/novo&id=<?php echo $dados2->id_mem ?>" class="btn-novo">Editar</a>
                            </div> 
                    </div>
                    <?php } else{?>
                        <div style="margin: auto; padding: 10px;">
                            <span>Nenhum resultado encontrado</span>
                        </div>
                    <?php } ?>

            <?php } else if(isset($dadosModel[1])){ if(isset($dadosModel[1])){
               
                }?> 
                <div> 
                    <table border="1px" class="table-resultado">
                        <thead class="thead">
                            <tr> 
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <tr><td>Código: <?= $dados2[0]->ident?></td></tr>
                            <tr><td>Nome: <?= $dados2[0]->nome?></td></tr>
                            <tr><td>Bilhete: <?= $dados2[0]->identidade?></td></tr>
                            <tr><td>Gênero: <?= $dados2[0]->genero?></td></tr>
                            <tr><td>Estado Civil: <?= $dados2[0]->esta_civil?></td></tr>
                            <tr></tr>
                            <tr><td>Local de membrasia: <?= $local_bap?></td></tr>
                            <tr><td>Membro por: <?= $tipo_memb?></td></tr>
                            <tr><td>Data de Baptismo: <?= $data_bap?></td></tr>
                            <tr><td>Tempo de membrasia: <?= $tempo.' Anos'?></td></tr>
                        </tbody>
                    </table>
                            
                    <div>
                        <a href="<?php echo $pach?>membros/novo&id=<?php echo $dados2[0]->id_mem ?>" class="btn-novo">Editar</a>
                    </div> 
                    </div>
            <?php } ?>             
                                                                     
        </div>
    </main>
   
</body>
</html>