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
                            <h3>Missionários</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>discipulado';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn">Adicionar missionário</a>
                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>missionario/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
                                            <input type="text" class="txt-buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['busca']; ?>" name="busca" placeholder="Buscar...">                     
                                            <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                                        </form>                                  
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
                                                <td>Missionario</td> 
                                                <td>Consagracao</td>                                              
                                                <td>Campo missionário</td>
                                                 
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody id=tbody class="tbody">

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->nome; ?></td>
                                                        <td> <?php echo $row->data_consag; ?> </td> 
                                                        <td> <?php echo $row->campo; ?> </td> 
                                                              
                                                        <td> 
                                                            <a href="<?php echo $pach?>missionarios/novo&id=<?php echo $row->id_miss; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>missionarios/eliminar&cod=<?php echo $row->id_miss; ?>'">
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
                                                        <td> <?php echo $row->responsavel; ?> </td>    
                                                        <td> 
                                                            <a href="<?php echo $pach?>missionarios/novo&id=<?php echo $row->id_miss; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>missionarios/eliminar&cod=<?php echo $row->id_miss; ?>'">
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
                    <div class="title">Novo missionário</div>
                    <a href="<?php echo($pach)?>missionarios" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>missionarios/cadastrar" method="POST">
                    <div class="user-details">
                       
                    <div class="input-box">
                            <span class="details">Membro</span>
                            <select name="id_mem" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarMembros() as $row){?>          
                                    <option value="<?php echo $row->id_mem; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_mem == $dadosModel
                                    ->id_mem ? 'selected' : '' ?>>  <?php echo $row->nome; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>  

                        <div class="input-box">
                            <span class="details">Campos missionário</span>    
                            <select name="id_campo_miss" id="missionario" class="dropdown">
                                <option value="">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarCampos() as $row){?>          
                                    <option value="<?php echo $row->id_camp; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->localidade == $dadosModel->campo ? 'selected' :'' ?>>  <?php echo $row->localidade; ?></option> 

                                <?php } ?>  
                            </select>
                        </div> 

                        <div class="input-box">
                            <span class="details">Data de consagração</span>
                            <input type="hidden" name="id_miss" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_miss; ?>">
                            <input type="date" name="data_consag" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_consag; ?>"  require>
                        </div>
                                                                                                      
                    </div>
                    <div class="button">
                        <input type="submit" value="Salvar" name="enviar">
                    </div>
                </form>
            </div>
            
        </main>

</body>
</html>