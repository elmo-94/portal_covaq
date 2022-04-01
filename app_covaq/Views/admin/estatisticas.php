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
    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/loader.js"></script>
    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/jsapi.js"></script>
    <script type="text/javascript" src="<?php echo($pach)?>javascript/googlecharts/uds_api_contents.js"></script>

    <script type="text/javascript">

    function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
        ['Ano', 'Total'],
        <?php foreach($this->Model->cresc_igreja() as $row){?>
          ['<?php echo $row->ano?>', <?php echo $row->total?>],
        <?php }?>
        ]);

        new google.visualization.BarChart(document.getElementById('visualization')).
        draw(
          data,
          {
            curveType: "function", title: "",
            width: 450, height: 400,
            vAxis: { maxValue: 10 }
          }
        );
      }


      google.setOnLoadCallback(drawVisualization);

      function PieChart() {
        var data = google.visualization.arrayToDataTable([
        ['Ano', 'Total'],
        <?php foreach($this->Model->cresc_igreja() as $row){?>
          ['<?php echo $row->ano?>', <?php echo $row->total?>],
        <?php }?>
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
                                    <span>Membros transferidos</span>
                                </div>
                                <div>
                                    <span class="las la-users"></span>
                                </div>
                            </div>

                            <div class="card-single">
                                <div>
                                    <h1><?php echo $row->total_min; ?></h1>
                                    <span>Total de ministérios</span>
                                </div>
                                <div>
                                    <span class="las la-clipboard"></span>
                                </div>                            
                            </div>

                            <div class="card-single">
                                <div>
                                    <h1><?php echo $row->cas; ?></h1>
                                    <span>Casamentos realizados</span>
                                </div>
                                <div>
                                    <span class="las la-shipping-bag"></span>
                                </div>                                
                            </div>
                            
                            <div class="card-single">
                                <div>
                                    <h1><?php echo $row->oc; ?></h1>
                                    <span>Óbras concluídas</span>
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

            <div class="recent-grid" style="margin-top: 2rem;">

                <div class="projects">
                    <div class="card-header">
                            <h4>Crescimento da igreja por período</h4>  
                            <div class="box">
                                <select name="cmbEstado" id="" class="dropdown" style="padding: 3px; border:1px solid #08307a; border-radius: 3px; font-size: 13px">
                                    <option value="">Selecione um Período</option>
                                    <option value="Última semana" <?php if(isset($_REQUEST['id'])) echo 'Última semana' == $dadosModel->estado ? 'selected' : '' ?>>Última semana</option>
                                    <option value="Últimos 30 dias" <?php if(isset($_REQUEST['id'])) echo 'Últimos 30 dias' == $dadosModel->estado ? 'selected' : '' ?>>Últimos 30 dias</option>
                                    <option value="Este ano" <?php if(isset($_REQUEST['id'])) echo 'Este ano' == $dadosModel->estado ? 'selected' : '' ?>>Este ano</option>

                                </select>
                            </div>                        
                        </div>
                    <div class="grafico-view">                    
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
                                        <h4>Resumo</h4>                                                                          
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