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
                            <h3>Dízimos</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>financas';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Registar dízimo</a>

                                    <table>
                                        <td col-index = 4>Mês
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 5>Semana
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todas</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 6>Pagamento
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>


                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>dizimos/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
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
                                                <td>Data/Hora</td>
                                                <td>Membro</td> 
                                                <td>Cod. Membro</td>                                               
                                                <td col-index=4>Mês</td>                         
                                                <td col-index=5>Semana</td> 
                                                <td col-index=6>Tipo Pag.</td>
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
                                                        <td> <?php echo $row->nome; ?> </td>    
                                                        <td> <?php echo $row->ident; ?> </td>
                                                        <td> <?php echo $row->mes; ?></td>
                                                        <td> <?php echo $row->semana; ?> </td>    
                                                        <td> <?php echo $row->tipopag; ?> </td>
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                                                                    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>dizimos/novo&id=<?php echo $row->id_diz; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>dizimos/eliminar&cod=<?php echo $row->id_diz; ?>'">
                                                            
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
                                                        <td> <?php echo $row->nome; ?> </td>    
                                                        <td> <?php echo $row->ident; ?> </td>
                                                        <td> <?php echo $row->mes; ?></td>
                                                        <td> <?php echo $row->semana; ?> </td>    
                                                        <td> <?php echo $row->tipopag; ?> </td>
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                                                                    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>dizimos/novo&id=<?php echo $row->id_diz; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>dizimos/eliminar&cod=<?php echo $row->id_diz; ?>'">
                                                            
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
                    <div class="title">Registar entrada de dízimo</div>
                    <a href="<?php echo($pach)?>dizimos" id="close">X</a>
                </div>

                <form action="<?php echo $pach?>dizimos/cadastrar" method="POST">
                    <div class="user-details">                       
                        <div class="input-box">
                        <span class="details">Cód. Membro</span>
                        <input type="hidden" name="txtIdDiz" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_diz ?>">
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
                            <span class="details">Tipo de pagamento</span>
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
                            <span class="details">Mês</span>
                            <select name="cmbMes" id="" class="dropdown">
                                        <option value="">Selecione</option>
                                        <option value= "Janeiro" <?php if(isset($_REQUEST['id'])) echo 'Janeiro' == $dadosModel->mes ? 'selected' : '' ?> >Janeiro</option>
                                        <option value="Fevereiro" <?php if(isset($_REQUEST['id'])) echo 'Fevereiro' == $dadosModel->semana ? 'selected' : '' ?> >Fevereiro</option>
                                        <option value="Março" <?php if(isset($_REQUEST['id'])) echo 'Março' == $dadosModel->mes ? 'selected' : '' ?> >Março</option>
                                        <option value="Abril" <?php if(isset($_REQUEST['id'])) echo 'Abril' == $dadosModel->mes ? 'selected' : '' ?> >Abril</option>
                                        <option value="Maio" <?php if(isset($_REQUEST['id'])) echo 'Maio' == $dadosModel->mes ? 'selected' : '' ?> >Maio</option>
                                        <option value= "Junho" <?php if(isset($_REQUEST['id'])) echo 'Junho' == $dadosModel->mes ? 'selected' : '' ?> >Junho</option>
                                        <option value="Julho" <?php if(isset($_REQUEST['id'])) echo 'Julho' == $dadosModel->mes ? 'selected' : '' ?> >Julho</option>
                                        <option value="Agosto" <?php if(isset($_REQUEST['id'])) echo 'Agosto' == $dadosModel->mes ? 'selected' : '' ?> >Agosto</option>
                                        <option value="Setembro"<?php if(isset($_REQUEST['id'])) echo 'Setembro' == $dadosModel->mes ? 'selected' : '' ?> >Setembro</option>
                                        <option value="Outubro" <?php if(isset($_REQUEST['id'])) echo 'Outubro' == $dadosModel->mes ? 'selected' : '' ?> >Outubro</option>
                                        <option value="Novembro" <?php if(isset($_REQUEST['id'])) echo 'Novembro' == $dadosModel->mes ? 'selected' : '' ?> >Novembro</option>
                                        <option value="Dezembro" <?php if(isset($_REQUEST['id'])) echo 'Dezembro' == $dadosModel->mes ? 'selected' : '' ?> >Dezembro</option>
                                </select> 
                        </div>
                        <div class="input-box">
                            <span class="details">Semana</span>
                            <select name="cmbSemana" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="1ª Semana" <?php if(isset($_REQUEST['id'])) echo '1ª Semana' == $dadosModel->semana ? 'selected' : '' ?>>1ª Semana</option>
                                <option value="2ª Semana" <?php if(isset($_REQUEST['id'])) echo '2ª Semana' == $dadosModel->semana ? 'selected' : '' ?>>2ª Semana</option>
                                <option value="3ª Semana" <?php if(isset($_REQUEST['id'])) echo '3ª Semana' == $dadosModel->semana ? 'selected' : '' ?>>3ª Semana</option>
                                <option value="4ª Semana" <?php if(isset($_REQUEST['id'])) echo '4ª Semana' == $dadosModel->semana ? 'selected' : '' ?>>4ª Semana</option>
                                <option value="5ª Semana" <?php if(isset($_REQUEST['id'])) echo '5ª Semana' == $dadosModel->semana ? 'selected' : '' ?>>5ª Semana</option>

                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Valor</span>
                            <input type="text" name="txtValor" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->valor ?>" placeholder="Valor" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Observação</span>
                            <input type="text" name="txtObs" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->observacao ?>" placeholder="Observação" required>
                        </div>
                                          
                    </div>
                    
                    
                    <div class="button">
                        <input type="submit" value="Registar">
                    </div>
                </form>
            </div>
            
        </main>

        <script>
            getUniqueValuesFromColumn();
        </script>

</body>
</html>