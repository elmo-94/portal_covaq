<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI-Covaq</title>
    <link rel="stylesheet" href="http://maxst.incons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include_once("sidebar.php");
     ?>
    
    <div class="main-content">
    
        <?php 
            include_once("header.php");
        ?>
        <main>
            <div class="cards">               
                    <div class="card-button">
                        <a href="membros.php">
                            <div>
                                <h3>Patrimónios</h3>
                                <small>Registo patrimonial</small>
                            </div>
                            <div>
                                <img src="img/membros.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>
                
                    <div class="card-button">
                        <a href="ministerios.php">
                            <div>
                                <h3>Entrdas</h3>
                                <small>Registe de aquisição</small>
                            </div>
                            <div>
                                <img src="img/disc.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="">
                            <div>
                                <h3>Saídas</h3>
                                <small>Pedidos de materiais</small>
                            </div>
                            <div>
                                <img src="img/doc.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="">
                            <div>
                                <h3>Estatísticas</h3>
                                <small>Resumo detalhado</small>
                            </div>
                            <div>
                                <img src="img/estatistica.png" width="41px" height="34px" alt="">
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
                                <img src="img/chart.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>
          
                
        </main>

        </div>
    </div>

</body>
</html>
