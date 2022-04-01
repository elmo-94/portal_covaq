<?php

//include('protect.php');
include 'config.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SGI-Covaq</title>
    <link rel="stylesheet" href="http://maxst.incons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
    <link rel="stylesheet" href="<?php echo($pach)?>style/print.css">


    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/loader.js"></script>
    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/jsapi.js"></script>
    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/uds_api_contents.js"></script>

    <script type="text/javascript">

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
        ['Year', 'Entradas', 'Saidas', 'Saldo'],
          ['2017', 1500000, 1400000, 300000],
          ['2018', 1650000, 1500000, 320000],
          ['2019', 950000, 940000, 100000],
          ['2020', 890000, 870000, 200000]
        ]);

        new google.visualization.ColumnChart(document.getElementById('grafico')).
        draw(
          data,
          {
            curveType: "function", title: "Últimos registos financeiros" ,
            bar: {groupWidth: "75%"}, 
            width: 500, height: 300,
            vAxis: { maxValue: 20 }
          }
        );
      }

      google.setOnLoadCallback(drawVisualization);

      function crescimento_igreja() {
        var data = google.visualization.arrayToDataTable([
        ['Ano', 'Total'],
        <?php foreach($this->Model->cresc_igreja() as $row){?>
          ['<?php echo $row->ano?>', <?php echo $row->total?>],
        <?php }?>
        ]);

        new google.visualization.BarChart(document.getElementById('grafico2')).
        draw(
          data,
          {
            curveType: "function", title: "Crescimento da igreja por períodos",
            width: 400, height: 300,
            vAxis: { maxValue: 10 }
          }
        );
      }

      google.setOnLoadCallback(crescimento_igreja);
    </script>
</head>
<body>
        <main>
            <div class="no-print">
                <h3>Dashboard</h3>
            </div>
            <div class="only-print" style="text-align: center;">
                <img src="img/covaq.jpg" width="100" height="100" alt="">
                <p>Igreja Comunitária Baptista do Quixicongo <br> 
                Uma Igreja Voltada ao Discipulado <br><br></p>
                <h3>Relatório Estatístico</h3>
            </div>

            <div class="cards">
                <div class="card-single" style="background-color: #1fdada;" >
                    <div>                       
                        <h1>0<?php echo $dadosModel[0]->total_membros; ?></h1>
                        <span>Membros</span>
                    </div>
                    <div>
                        <img src="<?php echo($pach)?>img/membros.png" width="41px" height="34px" alt="">
                    </div>

                </div>

                <div class="card-single" style="background-color: green;" >
                    <div>
                        <h1>0<?php echo $dadosModel[0]->total_min; ?></h1>
                        <span>Ministérios</span>                                 
                    </div>
                    <div>
                        <img src="<?php echo($pach)?>img/pulpito.png" width="48px" height="38px" alt="">
                    </div>                            
                </div>

                <div class="card-single">
                    <div>
                        <h1>0<?php echo $dadosModel[0]->discip; ?></h1> 
                        <span>Discipuladores</span>
                                              
                    </div>
                    <div>
                        <img src="<?php echo($pach)?>img/disc.png" width="41px" height="34px" alt="">
                    </div>                                
                </div>
                <div class="card-single" style="background-color: orange;" >
                    <div>  
                        <h1>0<?php echo $dadosModel[0]->campos; ?></h1>             
                        <span>Camp. Missionários</span>                       
                    </div>
                    <div>
                        <img src="<?php echo($pach)?>img/missao.png" width="48px" height="38px" alt="">
                    </div>                        
                </div>

            </div>

            <div class="recent-grid">

                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="text-align: center;">Estatísticas geral</h4>     
                        </div>
                        <div class="grafico-view">                    
                         <div>
                            <div id="grafico"></div>
                         </div>   
                         <div>
                            <div id="grafico2"></div>
                         </div>                                       
                    </div>
                        
                    </div>
                </div>

                <div class="customers">
                        <div class="card">
                                <div class="card-header">
                                    <h4>Últimas Informações</h4> 
                                    <a href="<?php echo $pach?>informacoes" class="btn-novo no-print">Ver mais</a>                               
                                </div>
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
        </main>
    

</body>
</html>