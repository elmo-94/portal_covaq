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
                            <h3>Registos de saídas</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>financas';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Registas saídas</a>

                                    <table>
                                        <td col-index = 2>Destino
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
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>saidas/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
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
                                                <td col-indx=2>Destino</td>                                               
                                                <td>Necessidade</td>  
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
                                                        <td> <?php echo $row->destino; ?> </td>    
                                                        <td> <?php echo $row->necessidade; ?> </td>
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                                                                    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>saidas/novo&id=<?php echo $row->id_saida; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>saidas/eliminar&cod=<?php echo $row->id_saida; ?>'">
                                                            
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
                                                        <td> <?php echo $row->destino; ?> </td>    
                                                        <td> <?php echo $row->necessidade; ?> </td>
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                                                                    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>saidas/novo&id=<?php echo $row->id_saida; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>saidas/eliminar&cod=<?php echo $row->id_saida; ?>'">
                                                            
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
                    <div class="title">Registar movimentações</div>
                    <a href="<?php echo($pach)?>saidas" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>saidas/cadastrar" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Data</span>
                            <input type="hidden" name="id_saida" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_saida; ?>">
                            <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg; ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Destino</span>
                            <input type="text" name="txtDestino" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->destino ?>" placeholder="Destino">
                        </div>
                        <div class="input-box">
                            <span class="details">Necessidade</span>
                            <input type="text" name="txtNecessidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->necessidade;?>" placeholder="Necessidade" required>

                        </div>
                        
                        <div class="input-box">
                            <span class="details">Valor</span>
                            <input type="text" name="txtValor" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->valor;?>"  placeholder="Valor" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Observação</span>
                            <input type="text" name="txtObs" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->observacao;?>"  placeholder="Observação">
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