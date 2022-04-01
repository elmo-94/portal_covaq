<?php include 'config.php'; 
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
<body>
        <main>
            <div>
                <h2>Portal Covaq</h2>
            </div>
            
            <div class="cards">               
                    <div class="card-button">
                        <a href="<?php echo($pach)?>membros/busca">
                            <div>
                                <h3>Consulta de membros</h3>
                                <small>Consultar registo de membro</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/search.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>
                
                    <div class="card-button">
                        <a href="<?php echo($pach)?>membros/cad_membros">
                            <div>
                                <h3>Cadastro de membros</h3>
                                <small>Cadastrar dados do membro</small>
                            </div>
                            <div>
                                <img src="<?php echo($pach)?>img/add.png" width="41px" height="34px" alt="">
                            </div>
                        </a>
                    </div>


          
                
        </main>

</body>
</html>
