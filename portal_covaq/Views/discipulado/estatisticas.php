<?php include 'config.php'; 
//print_r($this->Model->estatisticas_administractiva());exit;
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
                            <h3>Estatísticas administractivas</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>admin';">Voltar</button>                                       
                        </div>
                        <div class="cards">
                        <?php foreach($this->Model->estatisticas_administractiva() as $row){?>
                            <div class="card-single">
                                <div>
                                    <h1><?php echo $row->mt; ?></h1>
                                    <span>Alunos consagrados</span>
                                </div>
                                <div>
                                    <span class="las la-users"></span>
                                </div>
                            </div>

                            <div class="card-single">
                                <div>
                                    <h1><?php echo $row->total_min; ?></h1>
                                    <span>Alunos Desistentes</span>
                                </div>
                                <div>
                                    <span class="las la-clipboard"></span>
                                </div>                            
                            </div>

                            <div class="card-single">
                                <div>
                                    <h1><?php echo $row->cas; ?></h1>
                                    <span>Processores Activos</span>
                                </div>
                                <div>
                                    <span class="las la-shipping-bag"></span>
                                </div>                                
                            </div>
                            
                            <div class="card-single">
                                <div>
                                    <h1><?php echo $row->oc; ?></h1>
                                    <span>Professores passivos</span>
                                </div>
                                <div>
                                    <span class="las la-google-wallet"></span>
                                </div>                        
                            </div>
                           
                            <?php }?>
                        </div>
                     </div>

                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Estatísticas</h3>  
                            <div class="box" >
                                <select name="cmbEstado" id="" class="dropdown" style="padding: 3px; border:1px solid #08307a; border-radius: 3px; font-size: 13px">
                                    <option value="">Selecione um Período</option>
                                    <option value="Última semana" <?php if(isset($_REQUEST['id'])) echo 'Última semana' == $dadosModel->estado ? 'selected' : '' ?>>Última semana</option>
                                    <option value="Últimos 30 dias" <?php if(isset($_REQUEST['id'])) echo 'Últimos 30 dias' == $dadosModel->estado ? 'selected' : '' ?>>Últimos 30 dias</option>
                                    <option value="Este ano" <?php if(isset($_REQUEST['id'])) echo 'Este ano' == $dadosModel->estado ? 'selected' : '' ?>>Este ano</option>

                                </select>
                            </div>                        
                        </div>
                                                                  
                    </div>
                </div>
            

                <div class="customers">
                            <div class="card">
                                    <div class="card-header">
                                        <h3>Novos membros (10) </h3>                                   
                                        <button>Ver tudo  <span class="las la-arrow-right"></span></button>
                                    </div>
                                    <div class="card-body">

                                        <div class="customer">
                                            <div class="info">
                                                <img src="img/info.png" width="40" height="40" alt="">
                                                <div>
                                                    <h4>Sabadão com 3C</h4>
                                                    <small>Dia 08 de Outubro</small>
                                                </div>
                                            </div>
                                            <div class="contact">
                                                <span class="las la-user-circle"></span>
                                                <span class="las la-comment"></span>
                                                <span class="las la-phone"></span>
                                            </div>
                                        </div>

                                        <div class="customer">
                                            <div class="info">
                                                <img src="img/info.png" width="40" height="40" alt="">
                                                <div>
                                                    <h4>Culto de Adoração</h4>
                                                    <small>Dias 25,26 e 27 de Outubro</small>
                                                </div>
                                            </div>
                                            <div class="contact">
                                                <span class="las la-user-circle"></span>
                                                <span class="las la-comment"></span>
                                                <span class="las la-phone"></span>
                                            </div>
                                        </div>

                                       
                                                                    
                                    </div>
                            </div>
                    </div>

                </div>        
        </main>

</body>
</html>