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
                            <h3>Informações</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>portal_covaq';">Voltar</button>                                       
                        </div>

                        <div class="customers">
                            <div class="card-body">
                                    <?php 
                                    foreach($this->Model->ultimas_informacoes() as $row){?>                                                                                                                          
                                        <div class="customer">
                                            <div class="info">
                                                <img src="<?php echo($pach);?>img/info.png" width="40" height="40" alt="">
                                                <div>
                                                    <h4><?php echo $row->descricao ?></h4>
                                                    <small><?php echo 'Dia '.date('d', strtotime($row->data_inicio)).
                                                                        ' de '.date('m', strtotime($row->data_inicio)).
                                                                        ' de '.date('Y', strtotime($row->data_inicio)) ?></small>
                                                </div>
                                            </div>
                                            <div class="contact">
                                                <span class="las la-user-circle"></span>
                                                <span class="las la-comment"></span>
                                                <span class="las la-phone"></span>
                                            </div>
                                        </div>

                                    <?php } ?>  
                                                                  
                            </div>
                        </div>
                    </div>
                </div>                          
            </div>
            
        </main>

        <script>
            getUniqueValuesFromColumn();
        </script>

</body>
</html>