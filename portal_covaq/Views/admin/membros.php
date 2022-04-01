<?php include 'config.php'; 


if(isset($_POST['nome'])){
       
    $busca = $_POST['nome'];

    if($busca != 'Todos'){
        $consulta = $this->Model->buscar($busca);
        $count = count($consulta); 
    }else{
        $consulta = $this->Model->listar();
        $count = count($consulta); 
    }
}
else{
    $consulta = $this->Model->listar();
    $count = count($consulta); 
}
    
if($count > 0){

    $data = '
    <table width="100%" class="table-page">
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
    ';
       
    foreach($consulta as $row){   
        $data = '
        <tbody>            
            <tr>
            <td> <?php echo $row->data_reg; ?></td>
                <td> <?php echo $row->num_reg; ?> </td>    
                <td> <?php echo $row->localidade; ?> </td>
                <td> <?php echo $row->ministro; ?></td>
                <td> <?php echo $row->noivo; ?> </td>    
                <td> <?php echo $row->noiva; ?> </td>    
                <td> <?php echo $row->estado; ?> </td>
                                                                                                    
                <td> 
                                                                           
                </td>
            </tr>
    </tbody>
    ';
    }
    $data = '</table>';
}else{
    $data = "Nemhum registo localizado";
}

echo $data;


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
                            <h3>Registos de membros</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="<?php echo($pach)?>membros/cad_membros" class="btn-novo">Registar membro</a>
                                    
                                    <table>
                                        <td col-index = 3>Tipo
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 5>Gênero
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <table>
                                        <td col-index = 9>Estado
                                            <select class="table-filter" id="dropdown-busca"  onchange="filter_rows()">
                                                <option value="all">Todos</option>
                                            </select>
                                        </td>
                                    </table>

                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>membros/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
                                            <input type="text" class="txt-buscar" id="buscar" value="<?php if(isset($_POST['btn-buscar'])) echo $_POST['busca']; ?>" name="busca" placeholder="Buscar...">                     
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
                                    <a href="<?php echo $pach?>membros/impirmir" class="">Imprimir</a>
                                </div>

                                <div class="table-responsive">
                                    <table width="100%" class="table-page" id="table-page">
                                        <thead>
                                            <tr>
                                                <td>Código</td>
                                                <td>Nome completo</td>
                                                <td col-index= 3>Tipo</td>
                                                <td>Nº do Bilhete</td>
                                                <td col-index= 5>Gênero</td>
                                                <td col-index= 6>Est. Civil</td>                                               
                                                <td>Telefone</td>                                                                                             
                                                <td>G.S</td>                                                                                             
                                                <td col-index= 9>Situação</td>
                                                <td>Foto</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody id=tbody>

                                        <?php   
                                        $ml=0; $mc=0;                                                  
                                         if(!isset($_REQUEST['texto'])){
                                             
                                                foreach($this->dados2 as $row){ 
                                                    if($row->tipo=='Local'){ $ml ++; } else { $mc++; }
                                                     ?>                                                
                                                    <tr>
                                                        <td> <?php echo $row->ident; ?></td>
                                                        <td> <?php echo $row->nome; ?> </td> 
                                                        <td> <?php echo $row->tipo; ?> </td>     
                                                        <td> <?php echo $row->identidade; ?> </td>                                                      
                                                        <td> <?php echo $row->genero; ?> </td>   
                                                        <td> <?php echo $row->esta_civil; ?></td> 
                                                        <td> <?php echo $row->telefone; ?></td>
                                                           
                                                        <td> <?php echo $row->grupo_sang; ?> </td>
                                                        
                                                        <td> <?php echo $row->estado; ?> </td>   
                                                        <td> <a href="<?php echo $pach?>membros/infor&id=<?php echo $row->id_mem; ?>#bg">
                                                            <?php if(!empty($row->foto)){?>
                                                                <img src="<?php echo $pach. 'img/fotos/'.$row->foto;?>" alt="" width="28px" height="28px"> 
                                                            <?php } ?>
                                                            </a>
                                                        </td>  
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: location.href='<?php echo $pach?>membros/infor&id=<?php echo $row->id_mem; ?>#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>membros/novo&id=<?php echo $row->id_mem; ?>'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>membros/eliminar&cod=<?php echo $row->id_mem; ?>'">
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{                                                    
                                                foreach($this->dados as $row){
                                                    if($row->tipo=='Local'){ $ml ++; } else { $mc++; }
                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $row->ident; ?></td>
                                                        <td> <?php echo $row->nome; ?> </td> 
                                                        <td> <?php echo $row->tipo; ?> </td>     
                                                        <td> <?php echo $row->identidade; ?> </td>                                                      
                                                        <td> <?php echo $row->genero; ?> </td>   
                                                        <td> <?php echo $row->esta_civil; ?></td> 
                                                        <td> <?php echo $row->telefone; ?></td>
                                                           
                                                        <td> <?php echo $row->grupo_sang; ?> </td>
                                                        
                                                        <td> <?php echo $row->estado; ?> </td>   
                                                        <td> <a href="<?php echo $pach?>membros/infor&id=<?php echo $row->id_mem; ?>#bg">
                                                            <?php if(!empty($row->foto)){?>
                                                                <img src="<?php echo $pach. 'img/fotos/'.$row->foto;?>" alt="" width="28px" height="28px"> 
                                                            <?php } ?>
                                                            </a>
                                                        </td>  
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: location.href='<?php echo $pach?>membros/infor&id=<?php echo $row->id_mem; ?>#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>membros/novo&id=<?php echo $row->id_mem; ?>'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>membros/eliminar&cod=<?php echo $row->id_mem; ?>'">
                                                            
                                                        </td>
                                                    </tr>
                                                <?php } 
                                         }?>  
                                                                                                              
                                        </tbody>                                       
                                    </table> 
                                    <small style="color: red;"> <br> <?php echo 'Membros locais: '.$ml. '<br> Membros dos campos: '.$mc; ?></small>  
                                </div>
                                                              
                            </div>
                        </div>
                     </div>

                </div>
            </div>

                
            <div class="container">
                <div class="container-header">
                    <div class="title">Ficha de membro</div>
                    <a href="<?php echo($pach)?>membros" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>obras/cadastrar" method="POST">
                    <div class="user-details">

                        <div class="input-box">
                            <img src="<?php  if(isset($_REQUEST['id'])) echo $pach. 'img/fotos/'. $dadosModel->foto;?>" alt="" width="200" height="200"> 
                        </div>                                                                            
                    </div>

                    <div class="input-box">
                            <span class="details">Código:</span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$dadosModel->ident; ?></span><br>
                            <span class="details">Nome: </span>
                            <span><?php if(isset($_REQUEST['id'])) echo ' '.$dadosModel->nome; ?></span>
                        </div>

                    <div class="button">
                        <input type="submit" hidden value="Salvar">
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
        
        <script src="text/javascript">

        

            function buscarNome(nome){
                $.ajax({
                    url: "membros",
                    method: "POST",
                    data: {nome:nome},
                    success: function(data){
                        $('.table-responsive').html(data);
                    }
                });
            }

            $(document).ready(function(){

                buscarNome();

                $('#buscar').keyup(function(){
                    var nome = $(this).val();
                    //alert(nome)
                    if(nome =! ''){
                        buscarNome(nome);
                    }
                    else{
                        buscarNome();
                    }
                });

            });

        </script>

</body>
</html>