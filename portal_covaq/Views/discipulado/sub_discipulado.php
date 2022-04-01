<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI-Covaq</title>
    <link rel="stylesheet" href="http://maxst.incons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
<body>
        <main>
            <div class="cards"> 

                    <div class="card-button">
                        <a href="<?php echo($pach)?>convertidos">
                            <div>
                                <h3>Novos convertidos</h3>
                                <small>Registo de novos convertidos</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/obras.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>              
                    <div class="card-button">
                        <a href="<?php echo($pach)?>discipuladores">
                            <div>
                                <h3>Discipuladores</h3>
                                <small>Professores do discipulado</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/membros.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>
                
                    <div class="card-button">
                        <a href="<?php echo($pach)?>turmas">
                            <div>
                                <h3>Discípulos</h3>
                                <small>Membros envolvidos no discipulado</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/disc.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>
                  
                    <div class="card-button">
                        <a href="<?php echo($pach)?>campos">
                            <div>
                                <h3>Campos missionários</h3>
                                <small>Pedidos de documentos</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/doc.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="<?php echo($pach)?>baptismo">
                            <div>
                                <h3>Baptismos</h3>
                                <small>Registos de baptismos realizados</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/doc.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="<?php echo($pach)?>discipulado/estatisticas">
                            <div>
                                <h3>Estatísticas</h3>
                                <small>Resumo detalhado</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/estatistica.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="">
                            <div>
                                <h3>Relatórios</h3>
                                <small>Consulta e impressão de informações</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/chart.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>
          
                
        </main>

</body>
</html>
