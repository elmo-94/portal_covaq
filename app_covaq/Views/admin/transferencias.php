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
                            <h3>Membros transferidos</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Nova transferência</a>

                                    <table>
                                        <td col-index = 6> <span style="margin-right: 5px;">Cidade:</span> 
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 7>  <span style="margin-right: 5px;">Estado:</span>
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>transf/buscar">
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
                                    <a href="imprimir.php" class="">Imprimir</a>
                                </div>
                                <div class="table-responsive">
                                    <table width="99%" class="table-page" id="table-page">
                                        <thead class="thead">
                                            <tr>
                                                <td>Data</td>
                                                <td>Cód. membro</td> 
                                                <td>Membro</td>                                               
                                                <td>Motivo</td>                         
                                                <td>Igreja</td> 
                                                <td col-index=6>Cidade</td>
                                                <td col-index=7>Estado</td>
                                                <td></td>                                               
                                            </tr>
                                        </thead>
                                        <tbody id=tbody class="tbody">

                                        <?php   

                                         if(!isset($_POST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){ ?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->ident; ?> </td>    
                                                        <td> <?php echo $row->nome; ?> </td>
                                                        <td> <?php echo $row->motivo; ?></td>
                                                        <td> <?php echo $row->destino; ?> </td>    
                                                        <td> <?php echo $row->localidade; ?> </td>
                                                        <td> <?php echo $row->estado; ?> </td>
                                                                                                    
                                                        <td>                        
                                                            <a href="<?php echo $pach?>transf/novo&id=<?php echo $row->id_transf; ?>"> 
                                                                <img src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>transf/eliminar&cod=<?php echo $row->id_transf; ?>'">
                                                                <img src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){?>
                                                    <tr>
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->ident; ?> </td>    
                                                        <td> <?php echo $row->nome; ?> </td>
                                                        <td> <?php echo $row->motivo; ?></td>
                                                        <td> <?php echo $row->destino; ?> </td>    
                                                        <td> <?php echo $row->localidade; ?> </td>
                                                        <td> <?php echo $row->estado; ?> </td>
                                                                                                    
                                                        <td> 
                                                            <a href="<?php echo $pach?>transf/novo&id=<?php echo $row->id_transf; ?>#bg"> 
                                                                <img src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>transf/eliminar&cod=<?php echo $row->id_transf; ?>'">
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
                    <div class="title">Nova transferência</div>
                    <a href="<?php echo($pach)?>transf" id="close">X</a>
                </div>

                <form action="<?php echo $pach?>transf/cadastrar" method="POST">
                    <div class="user-details"> 

                    <div class="input-box">
                            <span class="details">Membro</span>
                            <input type="hidden" name="id_transf" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_transf ?>">
                            <select name="id_mem" id="" class="dropdown">
                                <option value="1">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarMembros() as $row){?>          
                                    <option value="<?php echo $row->id_mem; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_mem == $dadosModel
                                    ->id_mem ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Data</span>
                            <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])){echo $dadosModel->data_reg; }else{echo date("d/m/Y");} ?>">
                        </div>
                    
                        <div class="input-box">
                            <span class="details">Motivo</span>
                            <input type="text" name="motivo" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->motivo ?>">
                        </div>

                        <div class="input-box">
                            <span class="details">Destino</span>
                            <input type="text" name="destino" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->destino ?>" placeholder="Igreja de destino" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Cidade</span>
                            <input type="text" name="localidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->localidade ?>" placeholder="Cidade de destino" required>
                        </div>
                     
                        <div class="input-box">
                            <span class="details">Estado</span>
                            <select name="estado" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="Temporária" <?php if(isset($_REQUEST['id'])) echo 'Temporária' == $dadosModel->estado ? 'selected' : '' ?>>Temporária</option>
                                <option value="Permanente" <?php if(isset($_REQUEST['id'])) echo 'Permanente' == $dadosModel->estado ? 'selected' : '' ?>>Permanente</option>
                            </select>
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