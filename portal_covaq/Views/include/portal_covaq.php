<?php include 'config.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI-Covaq</title>
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
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
               <div>
                    <div>
                        <img src="<?php echo($pach)?>img/bg1.jpg" width="100%" height="100%" alt="">
                    </div>      
                </div>
            
                <div class="cards" title="Consultar">                  
                    <div class="card-button">
                        <a href="<?php echo $pach?>membros/consultar">
                            <div>
                                <img src="<?php echo($pach)?>img/buscar48x48.png" width="10px" height="10px" alt="">
                            </div>
                            <div>
                                <h3>Consultar</h3>
                                <small>Faça aqui o seu cadastro de membro</small>
                            </div>                           
                        </a>
                    </div>

                    <div class="card-button" title="Cadastrar">
                        <a href="<?php echo $pach?>membros/cad_membros">
                            <div>
                                <img src="<?php echo($pach)?>img/add2.png" width="41px" height="34px" alt="">
                            </div>
                            <div>
                                <h3>Cadastrar</h3>
                                <small>Faça aqui o seu cadastro de membro</small>
                            </div>                           
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="<?php echo $pach?>informacoes">
                            <div>
                                <img src="<?php echo($pach)?>img/info2.png" width="41px" height="34px" alt="">
                            </div>
                            <div>
                                <h3>Informações</h3>
                                <small>Boletim informativo</small>
                            </div>                      
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="#">
                            <div>
                                <img src="<?php echo($pach)?>img/sol2.png" width="41px" height="34px" alt="">
                            </div>
                            <div>
                                <h3>Solicitações</h3>
                                <small>Faça aqui o seu cadastro de membro</small>
                            </div>                            
                        </a>
                    </div>
                
        </main>

</body>
</html>
