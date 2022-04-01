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
    <link rel="stylesheet" href="<?php echo($pach)?>style/main_modal.css">
    <script src="javascript/js_modal.js"></script>
</head>
<body>
        <main>
            <div class="cards">             
            <div class="card-button">
                        <a href="<?php echo($pach)?>fluxo">
                            <div>
                                <h3>Fluxo de caixa</h3>
                                <small>Controlo do fluxo de caixa</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/disc.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>  
                    <div class="card-button">
                        <a href="<?php echo($pach)?>dizimos">
                            <div>
                                <h3>Dízimos</h3>
                                <small>Registo de entrada de dízimos</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/membros.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>
                
                    <div class="card-button">
                        <a href="<?php echo($pach)?>entradas">
                            <div>
                                <h3>Outras Entradas</h3>
                                <small>Regisos de outros tipos de entradas</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>mg/disc.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="<?php echo($pach)?>saidas">
                            <div>
                                <h3>Saídas</h3>
                                <small>Controlo de saídas</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/doc.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="<?php echo($pach)?>contas">
                            <div>
                                <h3>Contas a pagar</h3>
                                <small>Contas a pagar</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/obras.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="<?php echo($pach)?>contas">
                            <div>
                                <h3>Contas a receber</h3>
                                <small>Contas a receber</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/obras.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>

                    <div class="card-button">
                        <a href="#bg">
                            <div>
                                <h3>Projeções</h3>
                                <small>Projeções financeiras mensais</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/chart.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div> 

                    <div class="card-button">
                        <a href="<?php echo($pach)?>dizimos/relatorio"">
                            <div>
                                <h3>Relatório de Dízimos</h3>
                                <small>Consultar dados gerais sobre dízimos</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/chart.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div> 

                    <div class="card-button">
                        <a href="<?php echo($pach)?>financas/estatisticas">
                            <div>
                                <h3>Estatísticas</h3>
                                <small>Resumo detalhado</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/estatistica.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>


                    <div class="container">

                        <div class="container-header">
                            <div class="title">Registar entrada de dízimo</div>
                            <a href="<?php echo($pach)?>dizimos" id="close">X</a>
                        </div>

                        <form action="<?php echo $pach?>dizimos/cadastrar" method="POST">

                            <div class="button">
                                <input type="submit" value="Registar" name="enviar">
                            </div>
                            <div class="button">
                                <input type="submit" value="Registar" name="enviar">
                            </div>
                        </form>
                        </div>
                           
        </main>
</body>
</html>
