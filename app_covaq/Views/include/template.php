<?php require_once 'config.php';
//print_r($dados2);exit;
if(!isset($_SESSION))
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>iChurch</title>
    <link rel="icon" href="<?php echo($pach)?>img/church.ico">
    <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
</head>
<body>
        <?php if($nomeView != 'include/login' /*&& $nomeView !='include/portal_membro'*/) include("sidebar.php"); ?>
       
        <div class="main-content" id="bg">
        
            <?php if($nomeView != 'include/login' /*&& $nomeView !='include/portal_membro'*/) //include("header.php");?>                
            
                <?php $this->carregarViewNoTemplate($nomeView, $dadosModel, $dados2); ?>          
        
        </div>
        <?php  if($nomeView != 'include/login' /*&& $nomeView !='include/portal_membro'*/) include("footer.php"); ?>

    
</body>
</html>