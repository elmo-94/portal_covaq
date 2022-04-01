<?php require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Covaq</title>
    <link rel="icon" href="<?php echo($pach)?>img/church.ico">
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
</head>
<body>
        <?php  include("sidebar.php"); ?>
        
        <div class="main-content" id="bg">
        
            <?php include("header.php");?>                
            
                <?php $this->carregarViewNoTemplate($nomeView, $dadosModel, $dados2); ?>

            <?php  include("footer.php"); ?>
            
        
        </div>
   
    
</body>
</html>