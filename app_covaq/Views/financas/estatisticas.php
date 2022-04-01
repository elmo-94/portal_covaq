<?php include 'config.php'; 
//print_r($dadosModel[0]->contas_atrasadas);exit;

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
    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/loader.js"></script>
    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/jsapi.js"></script>
    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/uds_api_contents.js"></script>

    <script type="text/javascript">
      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
        ['Year', 'Entradas', 'Saidas', 'Saldo'],
          ['2017', 1560000, 1200000, 300000],
          ['2018', 1320000, 1000000, 320000],
          ['2019', 950000, 940000, 100000],
          ['2020', 890000, 870000, 200000]
        ]);

        new google.visualization.ColumnChart(document.getElementById('visualization')).
        draw(
          data,
          {
            curveType: "function", title: "",
            width: 450, height: 400,
            vAxis: { maxValue: 70 }
          }
        );
      }


      google.setOnLoadCallback(drawVisualization);

      function PieChart() {
        var data = google.visualization.arrayToDataTable([
        ['Year', 'Entradas', 'Saidas', 'Saldo'],
          ['2017', 1560000, 1200000, 300000],
          ['2018', 1320000, 1000000, 320000],
          ['2019', 950000, 940000, 100000],
          ['2020', 890000, 870000, 200000]
        ]);

        new google.visualization.PieChart(document.getElementById('piechart')).
        draw(
          data,
          {
            curveType: "function", title: "",
            width: 450, height: 400,
            vAxis: { maxValue: 20 }
          }
        );
      }


      google.setOnLoadCallback(PieChart);
    </script>
</head>
<body>

        <main >
            
           
                    <div>

                        <div class="card-header">
                            <h3>Estatísticas financeiras</h3> 
                            <button onclick="javascript: location.href='<?php echo($pach)?>financas';">Voltar</button>                                       
                        </div>
                        <div class="cards">
                        <?php foreach($this->Model->estatisticas_total() as $row){?>
      
                            <div class="card-single">
                                <div>
                                    <h1 style="color: rgb(3, 99, 241);"><?php echo number_format($row->total_ent,2,',','.'); ?></h1>
                                    <span>Entradas</span>
                                </div>
                                <div>
                                    <!--<img src="<?php echo($pach)?>img/obras.png" width="41px" height="34px" alt="">-->

                                </div>
                            </div>

                            <div class="card-single">
                                <div>
                                    <h1 style="color: red;"><?php echo number_format($row->total_saida,2,',','.'); ?></h1>
                                    <span>Saídas</span>
                                </div>
                                <div>
                                    <span class="las la-clipboard"></span>
                                </div>                            
                            </div>

                            <div class="card-single">
                                <div>
                                    <h1 style="color: rgb(33, 241, 6);"><?php echo number_format($row->saldo,2,',','.'); ?></h1>
                                    <span>Saldo</span>
                                </div>
                                <div>
                                    <span class="las la-shipping-bag"></span>
                                </div>                                
                            </div>
                            <div class="card-single">
                                <div>
                                    <h1>46.000,00<?php  $dadosModel[0]->contas_atrasadas; ?></h1>
                                    <span>Rendimento mensal</span>
                                </div>
                                <div>
                                    <span class="las la-google-wallet"></span>
                                </div>                        
                            </div>
                            <?php } ?>
                        </div>

                    </div>

            

            <div class="recent-grid" style="margin-top: 2rem;">

                <div class="projects">
                    <div style="display: flex;">                       
                         <div>
                            <div id="visualization"></div>
                         </div>   
                         <div>
                            <div id="piechart"></div>
                         </div>                                       
                    </div>
                </div>
            

                <div class="customers">
                            <div class="card">
                                    <div class="card-header">
                                        <h3>Resumo</h3>                                                                          
                                    </div>
                                    <div class="card-body">

                                        <div class="customer">
                                            <div class="info">

                                                <h4 style="margin-right: 7rem;">Contas a receber</h4>
                                                <small class="count">04</small>
                                                
                                            </div>
                                        </div>

                                        <div class="customer">
                                            <div class="info">
                                                <!--<img src="img/info.png" width="40" height="40" alt="">-->
                                                <div style="display: flex; justify-content: space-between;align-items: center;">
                                                    <h4 style="margin-right: 7rem;">Contas a pagar</h4>
                                                    <small class="count">05</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="customer">
                                            <div class="info">
                                                <!--<img src="img/info.png" width="40" height="40" alt="">-->
                                                <div style="display: flex; justify-content: space-between;align-items: center;">
                                                    <h4 style="margin-right: 7rem;">Contas atrasadas</h4>
                                                    <small class="count">02</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="customer">
                                            <div class="info">
                                                <!--<img src="img/info.png" width="40" height="40" alt="">-->
                                                <div style="display: flex; justify-content: space-between;align-items: center;">
                                                    <h4 style="margin-right: 8rem;">Contas pagas</h4>
                                                    <small class="count">07</small>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="customer">
                                            <div class="info">
                                                <!--<img src="img/info.png" width="40" height="40" alt="">-->
                                                <div style="display: flex; justify-content: space-between;align-items: center;">
                                                    <h4 style="margin-right: 7rem;">Total de contas</h4>
                                                    <small class="count">20</small>
                                                </div>
                                            </div>
                                        </div>
                                                                                                                                               
                                    </div>
                            </div>
                    </div>

                </div>        
        </main>

</body>
</html>