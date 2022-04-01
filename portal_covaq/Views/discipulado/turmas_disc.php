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
            <td col-index = 1>Nome completo</td>
            <td col-index = 2>Data de início</td>
            <td col-index = 3>Fase</td>
            <td col-index = 4>Consagração</td>
            <td col-index = 5>Estado</td>
            <td col-index = 6>Professor</td>
            <td></td>  
        </tr>
        <?php 
        } else{
            echo "Nenhum registo encontrado";
        }
        ?>
    </thead>

    <tbody>
        <?php
    foreach($consulta as $row){               
                ?>
            <tr>
                <td> <?php echo $row->aluno; ?> </td> 
                <td> <?php echo $row->data_reg; ?></td>                                                           
                <td> <?php echo $row->fase; ?> </td>
                <td> <?php echo $row->consagracao; ?> </td> 
                <td> <?php echo $row->estado; ?> </td>                                                                                                       
                <td> <?php echo $row->professor; ?></td>                                                                                                       
                <td> 
                    <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                    <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>turmas/novo&id=<?php echo $row->id_turma; ?>#bg'">
                                                             
                    <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>turmas/eliminar&cod=<?php echo $row->id_turma; ?>'">
                                                            
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
    <link rel="stylesheet" href="<?php echo($pach)?>style/print.css">
    <script src="javascript/js_modal.js"></script>
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/filter.js"></script>

</head>
<body>

        <main >
            
            <div class="recent-grid-page">
                <div class="projects">
                    <div class="card">
                        <div class="card-header no-print">
                            <h3>Alunos do discipulado</h3> 
                            
                            <button onclick="javascript: location.href='<?php echo($pach)?>discipulado';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header no-print">
                                    <a href="#bg" class="btn-novo">Adicionar novo aluno</a>
                                       

                                        <table>
                                            <td col-index = 5>Estado
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
                                 <div class="card-body-header no-print">                                                             
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
                                                <td col-index = 1>Nome completo</td>
                                                <td col-index = 2>Data de início</td>
                                                <td col-index = 3>Fase</td>
                                                <td col-index = 4>Consagração</td>
                                                <td col-index = 5>Estado</td>
                                                <td col-index = 6>Professor</td>                                                                                             
                                                <td></td>                                                 
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->aluno; ?> </td> 
                                                        <td> <?php echo $row->data_reg; ?></td>                                                           
                                                        <td> <?php echo $row->fase; ?> </td>
                                                        <td> <?php echo $row->consagracao; ?> </td> 
                                                        <td> <?php echo $row->estado; ?> </td>                                                                                                       
                                                        <td> <?php echo $row->professor; ?></td>
                                                        <td> 
                                                            <input type="button" class="btn-ver no-print" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar no-print" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>turmas/novo&id=<?php echo $row->id_turma; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar no-print" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>turmas/eliminar&cod=<?php echo $row->id_turma; ?>'">
                                                            
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
                    <a href="<?php echo($pach)?>turmas" id="close">X</a>
                </div>

                <form action="<?php echo $pach?>turmas/cadastrar" method="POST">
                    
                    <div class="user-details">   
                        
                        <div class="input-box">
                            <span class="details">Nome do aluno</span>
                            <input type="hidden" name="id_turma" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_turma ?>" required>
                            <select name="id_aluno" id="" class="dropdown" require>
                                <option value="1">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarConvertidos() as $row){?>          
                                    <option value="<?php echo $row->id_nc; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_nc == $dadosModel
                                    ->id_aluno ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>

                        <div class="input-box">
                            <span class="details">Professor</span>
                            <select name="id_prof" id="" class="dropdown">
                                <option value="1">Selecione</option>
                                <?php 
                                foreach($this->Model->carregarMembros() as $row){?>          
                                    <option value="<?php echo $row->id_mem; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_mem == $dadosModel
                                    ->id_prof ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 

                                <?php } ?>    
                            </select>
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Fase</span>
                            <select name="fase" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value= "1ª Fase" <?php if(isset($_REQUEST['id'])) echo '1ª Fase' == $dadosModel->fase ? 'selected' : '' ?> >1ª Fase</option>
                                <option value="2ª Fase" <?php if(isset($_REQUEST['id'])) echo '2ª Fase' == $dadosModel->fase ? 'selected' : '' ?> >2ª Fase</option>
                                <option value="3ª Fase" <?php if(isset($_REQUEST['id'])) echo '3ª Fase' == $dadosModel->fase ? 'selected' : '' ?> >3ª Fase</option>
                                <option value="4ª Fase" <?php if(isset($_REQUEST['id'])) echo '4ª Fase' == $dadosModel->fase ? 'selected' : '' ?> >4ª Fase</option>
                            </select> 
                        </div>

                        <div class="input-box">
                            <span class="details">Estado</span>
                            <select name="estado" id="" class="dropdown">
                                <option value="">Selecione</option>
                                <option value="1ª Vez" <?php if(isset($_REQUEST['id'])) echo '1ª Vez' == $dadosModel->estado ? 'selected' : '' ?> >1ª Vez</option>
                                <option value="Desistente" <?php if(isset($_REQUEST['id'])) echo 'Desistente' == $dadosModel->estado ? 'selected' : '' ?>>Desistente</option>
                                <option value="Reentegrado" <?php if(isset($_REQUEST['id'])) echo 'Reentegrado' == $dadosModel->estado ? 'selected' : '' ?>>Reentegrado</option>
                            </select>
                        </div> 

                        <div class="input-box">
                            <span class="details">Consagração</span>
                            <select name="consagracao" id="" class="dropdown">
                                <option value="Não" <?php if(isset($_REQUEST['id'])) echo 'Não' == $dadosModel->consagracao ? 'selected' : '' ?> >Não</option>
                                <option value="Sim" <?php if(isset($_REQUEST['id'])) echo 'Sim' == $dadosModel->consagracao ? 'selected' : '' ?>>Sim</option>
                            </select>
                        </div> 

                        <div class="input-box">
                            <span class="details">Data de início</span>
                            <input type="date" name="data_reg" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->data_reg; ?>"  require>
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