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
            
            <div class="recent-grid-page">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Contas a receber</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>financas';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn">Registas nova conta</a>
                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>contas/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
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
                                        <thead>
                                            <tr>
                                                <td>Data</td>
                                                <td>Conta</td>                                               
                                                <td>Tipo</td>  
                                                <td>Data de venc.</td>
                                                <td>Tipo de pag.</td>  
                                                <td>Valor</td> 
                                                <td>Estado</td>  
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
                                                        <td> <?php echo $row->conta; ?></td>
                                                        <td> <?php echo $row->tipo; ?> </td>  
                                                        <td> <?php echo $row->data_venc; ?> </td>     
                                                        <td> <?php echo $row->tipopag; ?> </td>
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                        <td> <?php echo $row->estado; ?> </td>
                                                                                                    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>contas/novoR&id=<?php echo $row->id_conta; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>contas/eliminarR&cod=<?php echo $row->id_conta; ?>'">
                                                            
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
                                                        <td> <?php echo $row->conta; ?></td>
                                                        <td> <?php echo $row->tipo; ?> </td>  
                                                        <td> <?php echo $row->data_venc; ?> </td>     
                                                        <td> <?php echo $row->tipopag; ?> </td>
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                        <td> <?php echo $row->estado; ?> </td>                                            
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>contas/novoR&id=<?php echo $row->id_conta; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>contas/eliminarR&cod=<?php echo $row->id_conta; ?>'">
                                                            
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
                    <div class="title">Registar nova conta</div>
                    <a href="<?php echo($pach)?>contas" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>contas/cadastrarR" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Conta</span>
                            <input type="hidden" name="id_conta" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_conta; ?>">
                            <input type="text" name="txtConta" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->conta; ?>" placeholder="Descrição da conta" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Tipo de conta</span>
                            <select name="cmbTipo" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="A receber" <?php if(isset($_REQUEST['id'])) echo 'A receber' == $dadosModel->tipo ? 'selected' : '' ?>>A receber</option>                            
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Data de vencimento</span>
                            <input type="date" name="data_venc" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_venc; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Tipo de pag.</span>
                            <select name="cmbTipopag" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarTipoPag() as $row){?>          
                                    <option value="<?php echo $row->id_tipopag; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_tipopag == $dadosModel
                                    ->id_tipopag ? 'selected' :'' ?>>  <?php echo $row->tipopag; ?></option> 

                                <?php } ?>                                                                             
                            </select>                          
                        </div>
                        <div class="input-box">
                            <span class="details">Valor</span>
                            <input type="text" name="txtValor" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->valor;?>"  placeholder="Valor" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Estado</span>
                            <select name="cmbEstado" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="Pago" <?php if(isset($_REQUEST['id'])) echo 'Pago' == $dadosModel->estado ? 'selected' : '' ?>>Pago</option>
                                <option value="Não pago" <?php if(isset($_REQUEST['id'])) echo 'Não pago' == $dadosModel->estado ? 'selected' : '' ?>>Não pago</option>                            
                            </select>
                        </div>
                    
                    </div>
                    <div class="button">
                        <input type="submit" value="Salvar">
                    </div>
                </form>
            </div>
            
        </main>

</body>
</html>