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
                            <h3>Registos de Óbras</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Registar nova óbra</a>

                                    <table>
                                        <td col-index = 2>Local
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
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>obras/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
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
                                                <td>Descrição</td>                                              
                                                <td col-index= 2>Localidade</td>  
                                                <td>Início</td>
                                                <td>Conclusão</td>                                              
                                                <td>Financiador</td>  
                                                <td>Orçamento</td>
                                                <td col-index=7>Estado</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){ 
                                                    $valor = $row->orcamento;                                                    
                                                    $total=$total+$valor ; ?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->descricao; ?></td>
                                                        <td> <?php echo $row->localidade; ?> </td>    
                                                        <td> <?php echo $row->data_inicio; ?> </td>
                                                        <td> <?php echo $row->data_fim; ?></td>
                                                        <td> <?php echo $row->financiador; ?> </td>    
                                                        <td> <?php echo number_format($valor,2,',','.'); ?></td>
                                                        <td> <?php echo $row->estado; ?> </td>                                       
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>obras/novo&id=<?php echo $row->id_obra; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>obras/eliminar&cod=<?php echo $row->id_obra; ?>'">
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){?>
                                                    <tr>
                                                        <td> <?php echo $row->descricao; ?></td>
                                                        <td> <?php echo $row->localidade; ?> </td>    
                                                        <td> <?php echo $row->data_inicio; ?> </td>
                                                        <td> <?php echo $row->data_fim; ?></td>
                                                        <td> <?php echo $row->financiador; ?> </td>    
                                                        <td> <?php echo number_format($row->valor,2,',','.'); ?></td>
                                                        <td> <?php echo $row->estado; ?> </td>    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>obras/novo&id=<?php echo $row->id_obra; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>obras/eliminar&cod=<?php echo $row->id_obra; ?>'">
                                                            
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
                    <div class="title">Registar nova óbra</div>
                    <a href="<?php echo($pach)?>obras" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>obras/cadastrar" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Descrição</span>
                            <input type="hidden" name="id_obra" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_obra; ?>">
                            <input type="text" name="descricao" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->descricao; ?>"  require>
                        </div>
                        <div class="input-box">
                            <span class="details">Localidade</span>
                            <input type="text" name="localidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->localidade; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Data de início</span>
                            <input type="date" name="data_inicio" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_inicio; ?>"  require>
                        </div>     
                        <div class="input-box">
                            <span class="details">Data de término</span>
                            <input type="date" name="data_fim" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_fim; ?>"  require>
                        </div> 
                        <div class="input-box">
                            <span class="details">Financiador</span>
                            <input type="text" name="financiador" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->financiador; ?>"  require>
                        </div>     
                        <div class="input-box">
                            <span class="details">Valor do orçamento</span>
                            <input type="text" name="orcamento" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->orcamento; ?>"  require>
                        </div> 
                        <div class="input-box">
                            <span class="details">Estado</span>
                            <select name="estado" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="Concluida" <?php if(isset($_REQUEST['id'])) echo 'Concluida' == $dadosModel->estado ? 'selected' : '' ?>>Concluida</option>
                                <option value="Parada" <?php if(isset($_REQUEST['id'])) echo 'Parada' == $dadosModel->estado ? 'selected' : '' ?>>Parada</option>
                                <option value="Em construção" <?php if(isset($_REQUEST['id'])) echo 'Em construção' == $dadosModel->estado ? 'selected' : '' ?>>Em construção</option>
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
            window.onload = () => {
                console.log(document.querySelector("#table-page > tbody > tr:nth-child(1) > td:nth-child(3)").innerHTML)
            };
            getUniqueValuesFromColumn();
        </script>

</body>
</html>