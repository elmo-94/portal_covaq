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
            
            <div class="recent-grid-page">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Novos convertidos</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>discipulado';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Novo registo</a>

                                    <table>
                                        <td col-index = 3>Gênero
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 7>Estado
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>convertidos/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
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
                                    <table width="100%" class="table-page" id="table-page">
                                        <thead>
                                            <tr>
                                                <td>Nome completo</td>  
                                                <td>Nº do B.I</td>
                                                <td col-index=3>Gênero</td>                                              
                                                <td>Naturalidade</td>  
                                                <td>Telefone</td>
                                                <td>Data de conv.</td>                                              
                                                <td col-index=7>Estado</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody id=tbody>

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->nome; ?> </td>    
                                                        <td> <?php echo $row->identificacao; ?> </td>
                                                        <td> <?php echo $row->genero; ?></td>
                                                        <td> <?php echo $row->naturalidade; ?> </td>    
                                                        <td> <?php echo $row->telefone; ?> </td> 
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->estado; ?>                                       
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>convertidos/novo&id=<?php echo $row->id_nc; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>convertidos/eliminar&cod=<?php echo $row->id_nc; ?>'">
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){?>
                                                    <tr>
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->nome; ?> </td>    
                                                        <td> <?php echo $row->identificacao; ?> </td>
                                                        <td> <?php echo $row->genero; ?></td>
                                                        <td> <?php echo $row->naturalidade; ?> </td>    
                                                        <td> <?php echo $row->telefone; ?> </td> 
                                                        <td> <?php echo $row->estado; ?>                                       
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>convertidos/novo&id=<?php echo $row->id_nc; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>convertidos/eliminar&cod=<?php echo $row->id_nc; ?>'">
                                                            
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
                    <a href="<?php echo($pach)?>convertidos" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>convertidos/cadastrar" method="POST">
                    <div class="user-details">
                       
                        <div class="input-box">
                            <span class="details">Nome completo</span>
                            <input type="text" name="nome" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->nome; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Data</span>
                            <input type="hidden" name="id_nc" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_nc; ?>">
                            <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg; ?>"  require>
                        </div>
                        <div class="input-box">
                            <span class="details">BI nº</span>
                            <input type="text" name="identificacao" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->identificacao; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Gênero</span>
                            <select name="genero" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="Masculino" <?php if(isset($_REQUEST['id'])) echo 'Masculino' == $dadosModel->genero ? 'selected' : '' ?>>Masculino</option>
                                <option value="Feminino" <?php if(isset($_REQUEST['id'])) echo 'Feminino' == $dadosModel->genero ? 'selected' : '' ?>>Feminino</option>
                            </select>
                        </div> 
                        <div class="input-box">
                            <span class="details">Data de nasc.</span>
                            <input type="date" name="data_nasc" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_nasc; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Naturalidade</span>
                            <input type="text" name="naturalidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->naturalidade; ?>">
                        </div>

                        <div class="input-box">
                            <span class="details">Morada</span>
                            <input type="text" name="morada" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->morada; ?>">
                        </div>

                        <div class="input-box">
                            <span class="details">Telefone</span>
                            <input type="text" name="telefone" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->telefone; ?>">
                        </div>
                             
                        <div class="input-box">
                            <span class="details">Estado</span>
                            <select name="estado" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="Batizado" <?php if(isset($_REQUEST['id'])) echo 'Batizado' == $dadosModel->estado ? 'selected' : '' ?>>Batizado</option>
                                <option value="Não Batizado" <?php if(isset($_REQUEST['id'])) echo 'Não Batizado' == $dadosModel->estado ? 'selected' : '' ?>>Não Batizado</option>

                            </select>
                        </div>                                      

                                           
                    </div>
                    <div class="button">
                        <input type="submit" value="Salvar">
                    </div>
                </form>
            </div>
            
        </main>
        <script>
            getUniqueValuesFromColumn();
        </script>

</body>
</html>