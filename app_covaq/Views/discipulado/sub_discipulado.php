<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI-Covaq</title>
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/dropdown-submenu.css">
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
                        <a href="#" onclick="dropwDown_Mneu()">
                            <div>
                                <h3>Discípulos</h3>
                                <small>Alunos envolvidos no discipulado</small>
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
                                <small>Campos missionários</small>
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
                        <a href="<?php echo($pach)?>missionarios">
                            <div>
                                <h3>Missionários</h3>
                                <small>Responsaveis pela missão</small>
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
        <div class="menu">
                <h3>Alunos do discipulado</h3>
                <ul>
                    <li class="btn-novo"><img src="<?php echo($pach)?>" alt=""><a href="<?php echo $pach?>turmas/listar_membros_disc">Membros</a></li>
                    <li class="btn-novo"><img src="<?php echo($pach)?>" alt=""><a href="<?php echo $pach?>turmas">Novos convertidos</a></li>
                </ul>
            </div>
        </header>
        <script>
            function dropwDown_Mneu(){
                const menu = document.querySelector('.menu')
                    menu.classList.toggle('active')
            }
        </script>
</body>
</html>
