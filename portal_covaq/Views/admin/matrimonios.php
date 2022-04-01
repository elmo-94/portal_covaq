<?php include 'config.php'; 

sleep(1);
include('config.php');

if(isset($_POST['request'])){
       
    $request = $_POST['request'];
    if($request != 'Todos'){
        $consulta = $this->Model->buscar($request);
        $count = count($consulta); 
    }else{
        $consulta = $this->Model->listar();
        $count = count($consulta); 
    }
    
?>

<table>
    <?php
    if($count){

    ?>
    <thead>
        <tr>
            <td>Data</td>
            <td>Nº Doc.</td> 
            <td>Local</td>                                               
            <td>Ministro</td>                         
            <td>Noivo</td> 
            <td>Noiva.</td>
            <td>Estado</td>
            <td></td> 
        </tr>
        <?php 
        } else{
            echo "Sorry! no record Found";
        }
        ?>
    </thead>

    <tbody>
        <?php
    foreach($consulta as $row){               
                ?>
            <tr>
            <td> <?php echo $row->data_reg; ?></td>
                <td> <?php echo $row->num_reg; ?> </td>    
                <td> <?php echo $row->localidade; ?> </td>
                <td> <?php echo $row->ministro; ?></td>
                <td> <?php echo $row->noivo; ?> </td>    
                <td> <?php echo $row->noiva; ?> </td>    
                <td> <?php echo $row->estado; ?> </td>
                                                                                                    
                <td> 
                    <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                    <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>matrimonios/novo&id=<?php echo $row->id_mat; ?>#bg'">
                                                             
                    <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>matrimonios/eliminar&cod=<?php echo $row->id_mat; ?>'">
                                                            
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php exit;}

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
    <script src="javascript/js_modal.js"></script>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/filter.js"></script>

</head>
<body>

        <main >
            
            <div class="recent-grid-page">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Matrimónios realizados</h3> 
                            
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Novo matrimónio</a>

                                    <table >
                                        <td col-index = 7 >Estado
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

                                    <div>
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>matrimonios/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
                                            <input type="text" class="txt-buscar" id="fetchval" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['busca']; ?>" name="busca" placeholder="Buscar...">                     
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
                                                <td col-index = 1>Data</td>
                                                <td col-index = 2>Nº Doc.</td> 
                                                <td col-index = 3>Local</td>                                               
                                                <td col-index = 4>Ministro</td>                         
                                                <td col-index = 5>Marido</td> 
                                                <td col-index = 6>Esposa</td>
                                                <td col-index = 7>Estado

                                                </td>
                                                <td></td>                                                 
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->data_reg; ?></td>
                                                        <td> <?php echo $row->num_reg; ?> </td>    
                                                        <td> <?php echo $row->localidade; ?> </td>
                                                        <td> <?php echo $row->ministro; ?></td>
                                                        <td> <?php echo $row->noivo; ?> </td>    
                                                        <td> <?php echo $row->noiva; ?> </td>  
                                                        <td> <?php echo $row->estado; ?> </td>                                                                                                    
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>matrimonios/novo&id=<?php echo $row->id_mat; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>matrimonios/eliminar&cod=<?php echo $row->id_mat; ?>'">
                                                            
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
                    <div class="title">Registar matrimónios</div>
                    <a href="<?php echo($pach)?>matrimonios" id="close">X</a>
                </div>

                <form action="<?php echo $pach?>matrimonios/cadastrar" method="POST">
                    
                    <div class="user-details">   
                        
                        <div class="input-box">
                            <span class="details">Data</span>
                            <input type="hidden" name="id_mat" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_mat ?>" required>
                            <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg ?>" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Registo nº</span>
                            <input type="text" name="num_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->num_reg ?>" placeholder="Nº de registo" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Local</span>
                            <input type="text" name="localidade" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->localidade ?>" placeholder="Local da cerimónia" required>
                        </div>

                        <div class="input-box">
                            <span class="details">Ministro oficial</span>
                            <input type="text" name="ministro" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->ministro ?>" placeholder="Pastor celebrante required" require>
                        </div>
                                            
                        <div class="input-box">
                            <span class="details">Nome do noivo</span>
                            <select name="id_noivo" id="" class="dropdown" require>
                                <option value="1">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarMembros() as $row){?>          
                                    <option value="<?php echo $row->id_mem; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_mem == $dadosModel
                                    ->id_noivo ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Nome da noiva</span>
                            <select name="id_noiva" id="" class="dropdown">
                                <option value="1">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarMembros() as $row){?>          
                                    <option value="<?php echo $row->id_mem; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_mem == $dadosModel
                                    ->id_noiva ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>
                        
                                              
                        <div class="input-box">
                            <span class="details">Padrinho</span>
                            <input type="text" name="padrinho" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->padrinho ?>" placeholder="Nome da 1ª testemunha" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Madrinha</span>
                            <input type="text" name="madrinha" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->madrinha ?>" placeholder="Nome da 2ª testemunha" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Estado</span>
                            <select name="estado" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value= "Casados" <?php if(isset($_REQUEST['id'])) echo 'Casados' == $dadosModel->estado ? 'selected' : '' ?> >Casados</option>
                                <option value="Divórcio" <?php if(isset($_REQUEST['id'])) echo 'Divórcio' == $dadosModel->estado ? 'selected' : '' ?> >Divórcio</option>
                            </select> 
                        </div>
                                          
                    </div>
                    
                    
                    <div class="button">
                        <input type="submit" value="Registar">
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
                    url:"<?php echo $pach ?>/matrimonios",
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