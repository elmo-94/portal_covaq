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
    <link rel="stylesheet" href="<?php echo($pach)?>style/modal.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/print.css">
    <script src="javascript/js_modal.js"></script>
    <script src="javascript/jquery.min.js"></script>
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
                            <h3>Baptimos realizados</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>discipulado';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="<?php echo($pach)?>baptismo/cad_baptismo" class="btn-novo">Novo registo</a>

                                        <table>
                                            <td col-index = 2>Local 
                                                <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                    <option value="all">Todos</option>
                                                </select>
                                            </td>
                                        </table>

                                        <div style="display: flex;">
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
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>campos/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
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
                                    <table width="99%" class="table-page" id="table-page">
                                        <thead class="thead">
                                            <tr>
                                                <td col-index=1>Data</td> 
                                                <td col-index=2>Localidade</td>                                              
                                                <td>Pastor</td>
                                                <td>Nº de Bat.</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody id=tbody class="tbody">

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->localidade; ?> </td> 
                                                        <td> <?php echo $row->pastor; ?> </td> 
                                                        <td> <?php echo $row->total; ?> </td>   
                                                              
                                                        <td> 
                                                            <a href="<?php echo $pach?>baptismo/novo&id=<?php echo $row->id_bap; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>baptismo/eliminar&cod=<?php echo $row->id_bap; ?>'">
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
                                                        <td> <?php echo $row->localidade; ?> </td> 
                                                        <td> <?php echo $row->pastor; ?> </td> 
                                                        <td> <?php echo $row->total; ?> </td>    
                                                        <td> 
                                                            <a href="<?php echo $pach?>baptismo/novo&id=<?php echo $row->id_bap; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>baptismo/eliminar&cod=<?php echo $row->id_bap; ?>'">
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
                    <div class="title">Novo registo</div>
                    <a href="<?php echo($pach)?>baptismo" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>baptismo/cadastrar" method="POST">
                    <div class="user-details">
                       
                        <div class="input-box">
                            <span class="details">Local</span>
                            <select name="localidade" id="" class="dropdown">
                                <option value="1">Selecione</option>
                                <option value= "Igreja local" <?php if(isset($_REQUEST['id'])) echo 'Igreja local' == $dadosModel->localidade ? 'selected' : '' ?> >Igreja local</option>
                                <?php 
                                foreach($this->Model->carregarCampos() as $row){?>          
                                    <option value="<?php echo $row->localidade; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->localidade == $dadosModel
                                    ->localidade ? 'selected' :'' ?>>  <?php echo $row->localidade; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Data de realização</span>
                            <input type="hidden" name="id_bap" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_bap; ?>">
                            <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg; ?>"  require>
                        </div>

                        <div class="input-box">
                            <span class="details">Pastor celebrante</span>
                            <input type="text" name="pastor" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->pastor; ?>"  require>
                        </div>

                        <div class="input-box">
                            <span class="details">Nº de condidatos</span>
                            <input type="text" name="total" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->total; ?>"  require>
                        </div>

                                                                                                      
                    </div>
                    <div class="button">
                        <input type="submit" value="Salvar" name="enviar">
                    </div>
                </form>
            </div>
            
        </main>

        <script>
            function alerta(){
                alert('Teste')
            }
            window.onload = () => {
                console.log(document.querySelector("#table-page > tbody > tr:nth-child(1) > td:nth-child(3)").innerHTML)
            };

            getUniqueValuesFromColumn();
        </script>

        <script type="text/javascript">
            
        $(document).ready(function(){
            $("#fetchval").on('keyup',function(){
                var value = $(this).val();
                //alert(value);
                
                $.ajax({
                    url:"<?php echo $pach ?>/turmas",
                    type:"Post",
                    data:'request=' + value, 
                    beforeSend:function(){
                        $(".table-responsive").html("<span>Processando...</span>");

                    },
                    success:function(data){                       
                        $(".table-responsive").empty().html(data);

                    }
                });
            });
        });

    </script>

</body>
</html>