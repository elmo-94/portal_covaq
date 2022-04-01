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
                            <h3>Outras entradas</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>financas';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Registar entrada</a>

                                    <table>
                                        <td col-index = 2>Tipo
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <div style="display: flex; margin-top:1rem">
                                            <div>
                                                <span class="details"> De</span>
                                                <input id="dropdown-busca" type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg ?>" required>
                                            </div>

                                            <div>
                                                <span class="details" > Até </span>
                                                <input id="dropdown-busca"  type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg ?>" required>
                                            </div>
                                        </div>

                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>entradas/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
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
                                                <td>Data</td>                                              
                                                <td col-index=2>Tipo</td>  
                                                <td>Doador</td>
                                                <td>Valor</td>  
                                                <td></td>                                                                                          
                                            </tr>
                                        </thead>
                                        <tbody id=tbody>

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){  
                                                    $valor = $row->valor;                                                    
                                                    $total=$total+$valor ; ?>
                                                    <tr>
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->tipo; ?> </td>  
                                                        <td> <?php echo $row->doador; ?> </td>     
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                                                                    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>entradas/novo&id=<?php echo $row->id_ent; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>entradas/eliminar&cod=<?php echo $row->id_ent; ?>'">
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){                                                    
                                                    $valor = $row->valor;                                                    
                                                    $total += $valor;?>
                                                    <tr>
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->tipo; ?> </td>  
                                                        <td> <?php echo $row->doador; ?> </td>     
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>                                           
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>entradas/novo&id=<?php echo $row->id_ent; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>entradas/eliminar&cod=<?php echo $row->id_ent; ?>'">
                                                            
                                                        </td>
                                                    </tr>
                                                <?php } 
                                         }?>  
                                                                                                              
                                        </tbody>                                       
                                    </table>     
                                    <small> <br> <?php  echo 'Total: '.number_format( $total,2,',','.'); ?></small>
                                </div>
                               
                            </div>
                        </div>
                     </div>

                </div>
            </div>

                
            <div class="container">
                <div class="container-header">
                    <div class="title">Registar entrada</div>
                    <a href="<?php echo($pach)?>entradas" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>entradas/cadastrar" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Conta</span>
                            <input type="hidden" name="id_ent" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_ent; ?>">
                            <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg; ?>" require>
                        </div>
                        <div class="input-box">
                            <span class="details">Tipo</span>
                            <input type="text" name="txtTipo" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->tipo; ?>" placeholder="Tipo de entrada">
                        </div>
                        <div class="input-box">
                            <span class="details">Doador</span>
                            <input type="text" name="txtDoador" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->doador; ?>" placeholder="Doador">
                        </div>                   
                        <div class="input-box">
                            <span class="details">Valor</span>
                            <input type="text" name="txtValor" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->valor;?>"  placeholder="Valor" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Estado</span>
                            <select name="cmbEstado" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="Disponível" <?php if(isset($_REQUEST['id'])) echo 'Disponível' == $dadosModel->estado ? 'selected' : '' ?>>Disponível</option>
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