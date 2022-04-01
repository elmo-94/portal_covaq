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
    <link rel="stylesheet" href="<?php echo($pach)?>style/print.css">
    <script src="javascript/js_modal.js"></script>
    <script src="javascript/filter.js"></script>
    <script src="<?php echo($pach)?>javascript/jquery/jquery.js"></script>
    <script src="<?php echo($pach)?>javascript/jquery/jquery.min.js"></script>

    <script src='<?php echo($pach)?>dropdown/jquery-3.2.1.min.js' type='text/javascript'></script>
    <script src='<?php echo($pach)?>dropdown/select2/dist/js/select2.min.js' type='text/javascript'></script>

    <link href='<?php echo($pach)?>dropdown/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>

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
                        <div class="card-header no-print">
                            <h3>Relatório de dízimos</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>financas';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header no-print">

                                    <table>
                                        <td col-index = 4>Ano: &nbsp;
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 4>Mês: &nbsp;
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 3>Gênero: &nbsp;
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 4>Ministério: &nbsp;
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>dizimos/relatorio_consultar">
                                            <input type="text" class="txt-buscar" id="buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['texto']; ?>" name="texto" placeholder="Buscar...">                     
                                            <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                                        </form>                                  
                                    </div>
                                 </div>
                                 
                                <div class="table-responsive">
                                    <table width="99%" class="table-page" id="table-page">
                                        <thead class="thead">
                                            <tr>                                                                                               
                                                <td>Código</td> 
                                                <td>Membro</td>
                                                <td>B.I</td>                                                 
                                                <td col-index=3>Gênero</td>
                                                <td col-index=4>Ministério</td>
                                                <td>Dízimo</td>
                                                <td col-index=6>Mês</td> 
                                                <td>Valor</td>
                                                <td>Percentual</td>    
                                                <td></td>                                             
                                            </tr>
                                        </thead>
                                        <tbody id=tbody class="tbody">

                                        <?php   

                                         if(!isset($_POST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){  
                                                    $valor = $row->valor;                                                    
                                                    $total=$total+$valor ; ?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->ident; ?></td>
                                                        <td> <?php echo $row->nome; ?> </td> 
                                                        <td> <?php echo $row->identidade; ?> </td>    
                                                        <td> <?php echo $row->genero; ?> </td>
                                                        <td> <?php //echo $row->minist; ?> </td>
                                                        <td> <?php echo number_format($row->dizimo,2,',','.'); ?></td>
                                                        <td> <?php echo $row->mes; ?> </td>    
                                                        <td> <?php  
                                                                if($row->perc >=100){
                                                                    echo '<span style="color:green">'.number_format($row->valor,2,',','.').'</span>'; 
                                                                }else{
                                                                    echo '<span style="color:red">'.number_format($row->valor,2,',','.').'</span>'; 
                                                                }
                                                                ?>
                                                        </td>
                                                        <td><?php  
                                                                if($row->perc >=100){
                                                                    echo '<span style="color:green">'.number_format($row->perc,0,',','.').'%</span>'; 
                                                                }else{
                                                                    echo '<span style="color:red">'.number_format($row->perc,0,',','.').'%</span>'; 
                                                                }
                                                                ?></td>                                                      
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){                                                    
                                                    $valor = $row->valor;                                                    
                                                    $total += $valor;?>
                                                    <tr>
                                                        <td> <?php echo $row->ident; ?></td>
                                                        <td> <?php echo $row->nome; ?> </td>    
                                                        <td> <?php echo $row->identidade; ?> </td>    
                                                        <td> <?php echo $row->genero; ?> </td>
                                                        <td> <?php //echo $row->minist; ?> </td>
                                                        <td> <?php echo number_format($row->dizimo,2,',','.'); ?></td>
                                                        <td> <?php echo $row->mes; ?> </td>    
                                                        <td> <?php  
                                                                if($row->perc >=100){
                                                                    echo '<span style="color:green">'.number_format($row->valor,2,',','.').'</span>'; 
                                                                }else{
                                                                    echo '<span style="color:red">'.number_format($row->valor,2,',','.').'</span>'; 
                                                                }
                                                                ?>
                                                        </td>
                                                        <td><?php  
                                                                if($row->perc >=100){
                                                                    echo '<span style="color:green">'.number_format($row->perc,0,',','.').'%</span>'; 
                                                                }else{
                                                                    echo '<span style="color:red">'.number_format($row->perc,0,',','.').'%</span>'; 
                                                                }
                                                                ?></td>
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
                    <a href="<?php echo($pach)?>dizimos/concultar" id="close">X</a>
                </div>
                <!--
                <div class="card-body-busca">
                    <form class="form-busca" method="POST" action="<?php echo($pach)?>dizimos/buscar">
                        <input type="text" class="txt-buscar" id="buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['texto']; ?>" name="texto" placeholder="Buscar...">                     
                        <button type="submit" name="btn-buscar"  class="btn-buscar"></button>
                    </form>                                  
                </div> 
                                        -->
                <form action="<?php echo $pach?>dizimos/cadastrar" method="POST">
                    <div class="user-details">   
                   

                        <div class="input-box">
                        <span class="details">Nome do membro</span>
                        <input type="hidden" name="txtIdDiz" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_diz ?>">
                            <select name="id_mem" id="dropdown1" style="font-size: 16px;">
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
                            <span class="details">Data</span>
                            <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])){ echo $dadosModel->data_reg;}else{ echo "date('dd-mm-YY')";} ?>" required>
                        </div>
                                          
                    </div>
                    
                    
                    <div class="button">
                        <input type="submit" value="Registar" name="enviar">
                    </div>
                </form>
            </div>
            
        </main>
        <script>
        $(document).ready(function(){
            
            // Initialize select2
            $("#dropdown1").select2();
            $("#ministerio2").select2();
            $("#ministerio3").select2();
            $("#professor").select2();

            /*// Read selected option
            $('#but_read').click(function(){
                var username = $('#selUser option:selected').text();
                var userid = $('#selUser').val();
           
                $('#result').html("id : " + userid + ", name : " + username);
            });*/
        });
        </script>
        <script>
            getUniqueValuesFromColumn();
        </script>

</body>
</html>