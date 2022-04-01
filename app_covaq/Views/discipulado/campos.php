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
                            <h3>Campos missionários</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>discipulado';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn">Novo registo</a>
                                    <div class="card-body-busca">
                                        <div class="card-body-busca">
                                            <form class="form-busca" method="POST" action="<?php echo($pach)?>campos/buscar">
                                                <input type="text" class="txt-buscar" id="buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['texto']; ?>" name="texto" placeholder="Buscar...">                     
                                                <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                                            </form>                                  
                                        </div>                                
                                    </div>
                                 </div>
                                 <div class="card-body-header">                                                             
                                    <small> 
                                        <?php 
                                        if(isset($_REQUEST['texto'])){ 
                                            echo 'Registos encontrados: '.count($this->dados);
                                            }else{ echo 'Total de registos: '.count($this->dados2);
                                            }
                                        
                                        ?>
                                    </small>
                                    <a href="imprimir.php" class="">Imprimir</a>
                                </div>
                                <div class="table-responsive">
                                    <table width="100%" class="table-page">
                                        <thead class="thead">
                                            <tr>
                                                <td>Localidade</td> 
                                                <td>Fundação</td>                                              
                                                <td>Missionário</td>
                                                 
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody id=tbody class="tbody">

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->localidade; ?></td>
                                                        <td> <?php echo $row->data_fund; ?> </td> 
                                                        <td> <?php echo $row->nome; ?> </td> 
                                                              
                                                        <td> 
                                                            <a href="<?php echo $pach?>campos/novo&id=<?php echo $row->id_camp; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>campos/eliminar&cod=<?php echo $row->id_camp; ?>'">
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a> 
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){?>
                                                    <tr>
                                                        <td> <?php echo $row->localidade; ?></td>
                                                        <td> <?php echo $row->data_fund; ?> </td> 
                                                        <td> <?php echo $row->nome; ?> </td>    
                                                        <td> 
                                                            <a href="<?php echo $pach?>campos/novo&id=<?php echo $row->id_camp; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>campos/eliminar&cod=<?php echo $row->id_camp; ?>'">
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
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
                    <div class="title">Novo registo</div>
                    <a href="<?php echo($pach)?>campos" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>campos/cadastrar" method="POST">
                    <div class="user-details">
                       
                        <div class="input-box">
                            <span class="details">Localidade</span>
                            <input type="text" name="localidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->localidade; ?>">
                        </div>

                        <div class="input-box">
                            <span class="details">Data da fundação</span>
                            <input type="hidden" name="id_camp" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_camp; ?>">
                            <input type="date" name="data_fund" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_fund; ?>"  require>
                        </div>
<!--
                        <div class="input-box">
                            <span class="details">Missionario</span>

                            <select name="id_mem" id="" class="dropdown">
                                <option value="1">Selecione</option>
                                <?php /*
                                foreach($this->Model->carregarMissionarios() as $row){?>          
                                    <option value="<?php echo $row->id_miss; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_miss == $dadosModel
                                    ->id_miss ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 

                                <?php } */?>    
                            </select>
                        </div> 
                                -->                                                                     
                    </div>
                    <div class="button">
                        <input type="submit" value="Salvar" name="enviar">
                    </div>
                </form>
            </div>
            
        </main>

</body>
</html>