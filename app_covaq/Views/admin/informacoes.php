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
    <link rel="stylesheet" href="<?php echo($pach)?>style/main_modal.css">
    <script src="javascript/js_modal.js"></script>
    <script src="javascript/filter.js"></script>

</head>
<body>

        <main >
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
            <div class="recent-grid-page">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Informações</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Registar nova Informação</a>                                  

                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>informacoes/buscar">
                                            <input type="text" class="txt-buscar" id="buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['texto']; ?>" name="texto" placeholder="Buscar...">                     
                                            <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                                        </form>                                  
                                    </div>
                                 </div>
                                 <div class="card-body-header">                                                             
                                    <small>
                                        <?php 
                                        if(isset($_POST['texto'])){ 
                                            echo 'Registos encontrados: '.count($this->dados);
                                            }else{ echo 'Total de registos: '.count($this->dados2);
                                            }
                                        
                                        ?>
                                    </small>
                                    <a href="" class="">Imprimir</a>
                                </div>
                                <div class="table-responsive">
                                    <table width="99%" class="table-page" id="table-page">
                                        <thead class="thead">
                                            <tr>
                                                <td>Descrição</td>
                                                <td>Realizador</td> 
                                                <td>Local</td>                                               
                                                <td col-index=4>Duracao</td>                         
                                                <td>Inicio</td> 
                                                <td>Fim</td> 
                                                <td col-index=6>Público alvo</td>
                                                <td></td>                                               
                                            </tr>
                                        </thead>
                                        <tbody id=tbody class="tbody">

                                        <?php   

                                         if(!isset($_POST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){ ?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->descricao; ?></td>
                                                        <td> <?php echo $row->realizacao; ?> </td>    
                                                        <td> <?php echo $row->local_info; ?> </td>
                                                        <td> <?php echo $row->duracao; ?></td>
                                                        <td> <?php echo $row->data_inicio; ?> </td>    
                                                        <td> <?php echo $row->data_fim; ?> </td>
                                                        <td> <?php echo $row->destino; ?> </td>
                                                                                                    
                                                        <td>                        
                                                            <a href="<?php echo $pach?>informacoes/novo&id=<?php echo $row->id_info; ?>#bg"> 
                                                                <img src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) 
                                                                    location.href='<?php echo $pach?>informacoes/eliminar&cod=<?php echo $row->id_info; ?>'">
                                                                <img src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){?>
                                                    <tr>
                                                        <td> <?php echo $row->descricao; ?></td>
                                                        <td> <?php echo $row->realizacao; ?> </td>    
                                                        <td> <?php echo $row->local_info; ?> </td>
                                                        <td> <?php echo $row->duracao; ?></td>
                                                        <td> <?php echo $row->data_inicio; ?> </td>    
                                                        <td> <?php echo $row->data_fim; ?> </td>
                                                        <td> <?php echo $row->destino; ?> </td>
                                                                                                    
                                                        <td>                        
                                                            <a href="<?php echo $pach?>informacoes/novo&id=<?php echo $row->id_info; ?>#bg"> 
                                                                <img src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) 
                                                                    location.href='<?php echo $pach?>informacoes/eliminar&cod=<?php echo $row->id_info; ?>'">
                                                                <img src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } 
                                         }?>  
                                                                                                              
                                        </tbody>                                       
                                    </table>     
                                </div>
                               
                            </div>
                        </div>
                     </div>

                </div>
            </div>

                
            <div class="container">

                <div class="container-header">
                    <div class="title">Nova informação</div>
                    <a href="<?php echo($pach)?>informacoes" id="close">X</a>
                </div>

                <form action="<?php echo $pach?>informacoes/cadastrar" method="POST">
                    <div class="user-details">  

                        <div class="input-box">
                            <span class="details">Descrição</span>
                            <input type="hidden" name="id_info" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_info; ?>">
                            <input type="text" name="descricao" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->descricao ?>" placeholder="">
                        </div>  

                        <div class="input-box">
                            <span class="details">Local</span>
                            <input type="text" name="local_info" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->local_info ?>" placeholder="">
                        </div> 

                        <div class="input-box">
                            <span class="details">Data de início</span>
                            <input type="date" name="data_inicio" value="<?php if(isset($_REQUEST['id'])){echo $dadosModel->data_inicio; }else{echo date("d/m/Y");} ?>">
                        </div>

                        <div class="input-box">
                            <span class="details">Data de fim</span>
                            <input type="date" name="data_fim" value="<?php if(isset($_REQUEST['id'])){echo $dadosModel->data_fim; }else{echo date("d/m/Y");} ?>">
                        </div>

                        <div class="input-box">
                            <span class="details">Realizador</span>
                            <input type="text" name="realizacao" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->realizacao ?>" placeholder="">
                        </div>   
                        
                        <div class="input-box">
                            <span class="details">Duração</span>
                            <input type="text" name="duracao" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->duracao ?>" placeholder="">
                        </div> 

                        <div class="input-box">
                            <span class="details">Público alvo</span>
                            <input type="text" name="destino" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->destino ?>" placeholder="" >
                        </div>
                      
                                          
                    </div>
                    
                    
                    <div class="button">
                        <input type="submit" value="Registar" name="enviar">
                    </div>
                </form>
            </div>
            
        </main>

        <script>
            getUniqueValuesFromColumn();
        </script>

</body>
</html>