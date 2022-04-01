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
                                            <td col-index = 5>Local
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
                                        </thead>
                                        <tbody>

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){?>                                                
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
                            <span class="details">Estado</span>
                            <select name="estado" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value= "Activo" <?php if(isset($_REQUEST['id'])) echo 'Activo' == $dadosModel->estado ? 'selected' : '' ?> >Activo</option>
                                <option value="Passivo" <?php if(isset($_REQUEST['id'])) echo 'Passivo' == $dadosModel->estado ? 'selected' : '' ?> >Passivo</option>
                                <option value="Desistente" <?php if(isset($_REQUEST['id'])) echo 'Desistente' == $dadosModel->estado ? 'selected' : '' ?> >Desistente</option>
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