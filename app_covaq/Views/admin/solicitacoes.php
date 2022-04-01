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
                            <h3>Solicitações de Documentos</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Registar solicitação</a>

                                    <table>
                                        <td col-index = 5>Documento
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 6>Estado
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>


                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>solicitacao/buscar">
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
                                                <td>Nº de ofício</td>  
                                                <td>Membro</td>
                                                <td>Cód. membro</td>                                              
                                                <td col-index=5>Tipo de doc.</td>  
                                                <td col-index=6>estado</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody id=tbody class="tbody">

                                        <?php   

                                         if(!isset($_POST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->num_oficio; ?> </td>    
                                                        <td> <?php echo $row->nome; ?> </td>
                                                        <td> <?php echo $row->ident; ?></td>
                                                        <td> <?php echo $row->tipodoc; ?> </td>    
                                                        <td> <?php echo $row->estado; ?> </td>                                       
                                                        <td> 
                                                            <a href="<?php echo $pach?>solicitacao/novo&id=<?php echo $row->id_sol; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>solicitacao/eliminar&cod=<?php echo $row->id_sol; ?>'">
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a> 
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){?>
                                                    <tr>
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->num_oficio; ?> </td>    
                                                        <td> <?php echo $row->nome; ?> </td>
                                                        <td> <?php echo $row->ident; ?></td>
                                                        <td> <?php echo $row->tipo; ?> </td>    
                                                        <td> <?php echo $row->estado; ?> </td>    
                                                        <td> 
                                                            <a href="<?php echo $pach?>solicitacao/novo&id=<?php echo $row->id_sol; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>solicitacao/eliminar&cod=<?php echo $row->id_sol; ?>'">
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
                    <div class="title">Nova solicitação</div>
                    <a href="<?php echo($pach)?>solicitacao" id="close">X</a>
                </div> 
                <div class="card-body-busca">
                    <form class="form-busca" method="POST" action="<?php echo($pach)?>solicitacao/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
                        <input type="text" class="txt-buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['busca']; ?>" name="busca" placeholder="Buscar...">                     
                        <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                    </form>                                  
                </div>                           
                
                <form action="<?php echo $pach?>solicitacao/cadastrar" method="POST">
                    <div class="user-details">

                        <div class="input-box">
                            <span class="details">Membro</span>
                            <select name="cmbMembro" id="" class="dropdown">
                                <option value="1">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarMembros() as $row){?>          
                                    <option value="<?php echo $row->id_mem; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_mem == $dadosModel
                                    ->id_mem ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>     
                        <div class="input-box">
                            <span class="details">Cód. membro</span>
                            <select name="id_mem" id="" class="dropdown">
                                <option value="1">Selecione</option>   
                            <?php 
                                foreach($this->Model->carregarMembros() as $row){?>                                                                                           
                                    <option value="<?php echo $row->id_mem; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_mem == $dadosModel
                                    ->id_mem ? 'selected' :'' ?>>  <?php echo $row->ident; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Data</span>
                            <input type="hidden" name="id_sol" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_sol; ?>">
                            <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg; ?>"  require>
                        </div>
                        <div class="input-box">
                            <span class="details">Nº de ofício</span>
                            <input type="text" name="num_oficio" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->num_oficio; ?>">
                        </div>
                         
                        <div class="input-box">
                            <span class="details">Tipo de doc.</span>
                            <select name="id_tipodoc" id="" class="dropdown">
                                <option value="1">Selecione</option>   
                                <?php 
                                foreach($this->Model->carregarTipoDoc() as $row){?>                                                                                           
                                    <option value="<?php echo $row->id_tipodoc; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_tipodoc == $dadosModel
                                    ->id_tipodoc ? 'selected' :'' ?>>  <?php echo $row->tipodoc; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>     
                        <div class="input-box">
                            <span class="details">Estado</span>
                            <select name="estado" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="Deferido" <?php if(isset($_REQUEST['id'])) echo 'Deferido' == $dadosModel->estado ? 'selected' : '' ?>>Deferido</option>
                                <option value="Pendente" <?php if(isset($_REQUEST['id'])) echo 'Pendente' == $dadosModel->estado ? 'selected' : '' ?>>Pendente</option>
                                <option value="Em curso" <?php if(isset($_REQUEST['id'])) echo 'Em curso' == $dadosModel->estado ? 'selected' : '' ?>>Em cursoo</option>
                            </select>
                        </div>                                      

                                           
                    </div>
                    <div class="button">
                        <input type="submit" value="Salvar" name="enviar">
                    </div>
                </form>
            </div>
            
        </main>
        <script>
            getUniqueValuesFromColumn();
        </script>

</body>
</html>