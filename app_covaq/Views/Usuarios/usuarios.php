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

</head>
<body>

        <main >
            
            <div class="recent-grid-page">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Usuários registados</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                            <div class="card-body">                                
                                <div class="card-body-header">
                                    <a href="#bg" class="btn">Adicionar usuário</a>
                                    <div class="card-body-busca">
                                        <form class="form-busca" method="POST" action="<?php echo($pach)?>usuarios/buscar&texto=<?php if(isset($_POST['btn-buscar'])){ echo $_POST['busca']; }?>">
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
                                    <table width="100%" class="table-page">
                                        <thead>
                                            <tr>
                                                <td>Usuários</td>                                              
                                                <td>Email</td>  
                                                <td>Senha</td>
                                                <td>Nivel</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody id=tbody>

                                        <?php   

                                         if(!isset($_REQUEST['texto'])){
                                             $total=0;
                                                foreach($this->dados2 as $row){ ?>
                                                    <tr>
                                                        <td> <?php echo $row->usuario; ?></td>
                                                        <td> <?php echo $row->email; ?> </td>  
                                                        <td> <?php echo $row->senha; ?> </td> 
                                                        <td> <?php echo $row->nivel; ?> </td>                                       
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>usuarios/novo&id=<?php echo $row->id_user; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>usuarios/eliminar&cod=<?php echo $row->id_user; ?>'">
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                <?php }
                                                }else{
                                                    $total=0;
                                                foreach($this->dados as $row){?>
                                                    <tr>
                                                        <td> <?php echo $row->usuario; ?></td>
                                                        <td> <?php echo $row->email; ?> </td>  
                                                        <td> <?php echo $row->senha; ?> </td>   
                                                        <td> <?php echo $row->nivel; ?> </td>   
                                                        <td> 
                                                            <input type="button" class="btn-ver" value="Visualizar" onclick="Javascript: //location.href='?p=dizimos&editar=<?php //echo $row->id_mov; ?>;#bg'">   
                                                        
                                                            <input type="button" class="btn-editar" value="Editar" onclick="Javascript: location.href='<?php echo $pach?>usuarios/novo&id=<?php echo $row->id_user; ?>#bg'">
                                                             
                                                            <input type="button" class="btn-deletar" value="Excluir" onclick="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) location.href='<?php echo $pach?>usuarios/eliminar&cod=<?php echo $row->id_user; ?>'">
                                                            
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
                    <div class="title">Novo ministério</div>
                    <a href="<?php echo($pach)?>min" id="close">X</a>
                </div>                            
                
                <form action="<?php echo $pach?>min/cadastrar" method="POST">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nome</span>
                            <input type="hidden" name="id_min" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_min; ?>">
                            <input type="text" name="nome" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->nome; ?>" placeholder="Nome do ministério" require>
                        </div>
                        <div class="input-box">
                            <span class="details">Descrição</span>
                            <input type="text" name="descricao" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->descricao; ?>">
                        </div>
                        <div class="input-box">
                            <span class="details">Lider</span>
                            <input type="text" name="lider" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->lider; ?>"  require>
                        </div>                   
                                           
                    </div>
                    <div class="button">
                        <input type="submit" value="Salvar">
                    </div>
                </form>
            </div>
            
        </main>

</body>
</html>