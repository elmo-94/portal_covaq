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
            <td col-index = 1>Nome</td>
            <td col-index = 2>Gênero</td>
            <td col-index = 3>Telefone</td>
            <td col-index = 4>Data de início</td>
            <td col-index = 5>Local</td>
            <td col-index = 6>Estado</td>
            <td></td> 
        </tr>
        <?php 
        } else{
            echo "Nenhuma registo encontrado";
        }
        ?>
    </thead>

    <tbody>
        <?php
    foreach($consulta as $row){               
                ?>
            <tr>
                <td> <?php echo $row->nome; ?></td>
                <td> <?php echo $row->genero; ?> </td>
                <td> <?php echo $row->telefone; ?> </td>                                                          
                <td> <?php echo $row->data_reg; ?></td>
                <td> <?php echo $row->localidade; ?></td>
                <td> <?php echo $row->estado; ?> </td>                                                                                                       
                <td> 
                    <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                    <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>discipuladores/novo&id=<?php echo $row->id_discip; ?>#bg'">
                                                             
                    <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>discipuladores/eliminar&cod=<?php echo $row->id_discip; ?>'">
                                                            
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
                            <h3>Discipuladores</h3> 
                            
                            <button onclick="javascript: location.href='<?php echo($pach)?>discipulado';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn-novo">Adicionar discipulador</a>

                                        <table>
                                            <td col-index = 6>Estado
                                                <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                    <option value="all">Todos</option>
                                                </select>
                                            </td>
                                        </table>

                                        <table>
                                            <td col-index = 5>Fase 
                                                <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                    <option value="all">Todos</option>
                                                </select>
                                            </td>
                                        </table>

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
                                        <thead class="thead">
                                            <tr>
                                                <td col-index = 1>Nome</td>
                                                <td col-index = 2>Gênero</td>
                                                <td col-index = 3>Telefone</td>
                                                <td col-index = 4>Local</td>
                                                <td col-index = 5>Fase</td>
                                                <td col-index = 6>Estado</td>
                                                <td></td>                                                 
                                            </tr>
                                        </thead>
                                        <tbody class="tbody">

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->nome; ?></td>
                                                        <td> <?php echo $row->genero; ?> </td>
                                                        <td> <?php echo $row->telefone; ?> </td>                                                          
                                                        <td> <?php echo $row->localidade; ?></td>
                                                        <td> <?php echo $row->fase; ?></td>
                                                        <td> <?php echo $row->estado; ?> </td>                                                                                                        
                                                        <td> 
                                                            <a href="<?php echo $pach?>discipuladores/novo&id=<?php echo $row->id_discip; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>discipuladores/eliminar&cod=<?php echo $row->id_discip; ?>'">
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }} else{ 
                                                    foreach($this->dados2 as $row){?>
                                                     <tr>
                                                        <td> <?php echo $row->nome; ?></td>
                                                        <td> <?php echo $row->genero; ?> </td>
                                                        <td> <?php echo $row->telefone; ?> </td>                                                          
                                                        <td> <?php echo $row->localidade; ?></td>
                                                        <td> <?php echo $row->fase; ?></td>
                                                        <td> <?php echo $row->estado; ?> </td>                                                                                                        
                                                        <td> 
                                                            <a href="<?php echo $pach?>discipuladores/novo&id=<?php echo $row->id_discip; ?>#bg"> 
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/editarr.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>discipuladores/eliminar&cod=<?php echo $row->id_discip; ?>'">
                                                                <img style="border-radius: 50%;" src="<?php echo $pach?>img/delete.png" alt="" width="24px" height="24px">
                                                            </a>
                                                            
                                                        </td>
                                                    </tr>

                                                <?php }
                                         } ?>  
                                                                                                              
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
                    <div class="title">Adicionar novo aluno</div>
                    <a href="<?php echo($pach)?>discipuladores" id="close">X</a>
                </div>

                <form action="<?php echo $pach?>discipuladores/cadastrar" method="POST">
                    
                    <div class="user-details">   
                        
                        <div class="input-box">
                            <span class="details">Nome do membro</span>
                            <input type="hidden" name="id_discip" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_discip ?>" required>
                            <select name="id_mem" id="" class="dropdown">
                                <option value="1">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarMembros() as $row){?>          
                                    <option value="<?php echo $row->id_mem; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_mem == $dadosModel
                                    ->id_mem ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>

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
                            <span class="details">Fase</span>
                            <select name="fase" id="fase" class="dropdown" >
                                <option value="">Selecione</option>
                                <option value= "1ª Fase" <?php if(isset($_REQUEST['id'])) echo '1ª Fase' == $dadosModel->fase ? 'selected' : '' ?> >1ª Fase</option>
                                <option value="2ª Fase" <?php if(isset($_REQUEST['id'])) echo '2ª Fase' == $dadosModel->fase ? 'selected' : '' ?> >2ª Fase</option>
                                <option value="3ª Fase" <?php if(isset($_REQUEST['id'])) echo '3ª Fase' == $dadosModel->fase ? 'selected' : '' ?> >3ª Fase</option>
                                <option value="4ª Fase" <?php if(isset($_REQUEST['id'])) echo '4ª Fase' == $dadosModel->fase ? 'selected' : '' ?> >4ª Fase</option>
                                <option value="Nenhuma" <?php if(isset($_REQUEST['id'])) echo 'Nenhuma' == $dadosModel->fase ? 'selected' : '' ?>>Nenhuma</option>
                            </select> 
                        </div>
   
                        <div class="input-box">
                            <span class="details">Situação</span>
                            <select name="estado" id="situacao"  class="dropdown" >
                                <option value="">Selecione</option>
                                <option value="Regular" <?php if(isset($_REQUEST['id'])) echo 'Regular' == $dadosModel->estado? 'selected' : '' ?>>Regular</option>
                                <option value="Irregular" <?php if(isset($_REQUEST['id'])) echo 'Irregular' == $dadosModel->estado ? 'selected' : '' ?>>Irregular</option>
                                <option value="Desistente" <?php if(isset($_REQUEST['id'])) echo 'Desistente' == $dadosModel->estado ? 'selected' : '' ?>>Desistente</option>                                                        
                                <option value="Reentegrado" <?php if(isset($_REQUEST['id'])) echo 'Reentegrado' == $dadosModel->estado ? 'selected' : '' ?>>Reentegrado</option>
                            </select>
                        </div>
                                          
                    </div>
                    
                    
                    <div class="button">
                        <input type="submit" value="Registar" name="enviar">
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
                    url:"<?php echo $pach ?>discipuladores",
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