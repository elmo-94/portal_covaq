<?php include 'config.php'; 

if(isset($_REQUEST['id'])){
    $id_mov=$dadosModel->id_mov;
    $data_reg=$dadosModel->data_reg;
    $categoria=$dadosModel->categoria;
    $tipo=$dadosModel->tipo;
    $valor=$dadosModel->valor;
    $obs=$dadosModel->observacao;
}

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
                            <h3>Fluxo de caixa</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>financas';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Nova movimentação</a>

                                    <table>
                                        <td col-index = 2>Categoria
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todas</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 3>Tipo
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>fluxo/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
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
                                                <td col-index= 1>Data</td>
                                                <td col-index= 2>Categoria</td> 
                                                <td col-index= 3>Tipo</td>                                               
                                                <td col-index= 4>Valor</td> 
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
                                                        <td> <?php echo $row->categoria; ?> </td>    
                                                        <td> <?php echo $row->tipo; ?> </td>
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                                                                    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>fluxo/novo&id=<?php echo $row->id_mov; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>fluxo/eliminar&cod=<?php echo $row->id_mov; ?>'">
                                                            
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
                                                        <td> <?php echo $row->categoria; ?> </td>    
                                                        <td> <?php echo $row->tipo; ?> </td>
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                                                                    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>fluxo/novo&id=<?php echo $row->id_mov; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>fluxo/eliminar&cod=<?php echo $row->id_mov; ?>'">
                                                            
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
                    <a href="<?php echo($pach)?>fluxo" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>fluxo/cadastrar" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Data</span>
                            <input type="hidden" name="txtIdMov" value="<?php if(isset($_REQUEST['id'])) echo $id_mov; ?>">
                            <input type="date" value="<?php if(isset($_REQUEST['id'])) echo $data_reg; ?>" name="data_reg" type="text" placeholder="Cód. do membro" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Categoria</span>
                            <select name="cmbCategoria" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="Receita"<?php if(isset($_REQUEST['id'])) echo 'Receita' == $categoria ? 'selected' : '' ?>>Receita</option>
                                <option value="Despesa"<?php if(isset($_REQUEST['id'])) echo 'Despesa' == $categoria ? 'selected' : '' ?>>Despesa</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Tipo</span>
                            <input type="text" value="<?php if(isset($_REQUEST['id'])) echo $tipo;?>" placeholder="tipo" name="txtTipo" required>

                        </div>
                        
                        <div class="input-box">
                            <span class="details">Valor</span>
                            <input type="text" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->valor;?>" name="txtValor" placeholder="Valor" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Observação</span>
                            <input type="text" value="<?php if(isset($_REQUEST['id'])) echo $obs;?>" name="txtObs" placeholder="Observação" required>
                        </div>
                        
                    
                    </div>
                    
                    <div class="button">
                        <input type="submit" value="Salvar">
                    </div>
                </form>
            </div>
            
        </main>
        <script>
            window.onload = () => {
                //console.log(document.querySelector("#table-page > tbody > tr:nth-child(1) > td:nth-child(4)").innerHTML)
                //var valor = document.querySelector("#table-page > tbody > tr:nth-child(1) > td:nth-child(4)").innerHTML
                //console.log(parseInt(valor))
                
                //allFilters = document.querySelectorAll(".table-filter")

                //allFilters.forEach((filter_i) => {
                //col_index = filter_i.parentElement.getAttribute("col-index");
                const rows = document.querySelectorAll("#table-page > tbody > tr");
                rows.forEach((row) => {
                console.log(row.querySelector("td:nth-child("+4+")").innerHTML);

                });
            //});
            }

            getUniqueValuesFromColumn();
        </script>

</body>
</html>