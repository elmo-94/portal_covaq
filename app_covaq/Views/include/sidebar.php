<?php
include 'config.php';
//include 'protect.php';
    
?>

<html>
    <head>
       <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
       <link rel="stylesheet" href="<?php echo($pach)?>style/print.css">
    </head>
    <body>
        <input type="checkbox" id="nav-toggle">
        <div class="sidebar no-print">
            
            <div class="sidebar-brand"> 
                <h2> <img src="<?php echo($pach)?>img/church.png" alt=""><span> iChurch</span></h2>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="<?php echo($pach)?>home/painel"><img src="<?php echo($pach);?>img/dashboard.png" alt="">
                            <span>Dashboard</span> </a>
                    </li>
                    <li>
                        <a  href="<?php echo($pach)?>admin">                             
                            <img src="<?php echo($pach)?>img/admin.png" alt=""></span>
                            <span>Administração</span> 
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo($pach)?>discipulado"><img src="<?php echo($pach);?>img/study.png" alt=""></span>
                        <span>Discipulado</span> </a>
                    </li>
                    <li>
                        <a href="<?php echo($pach);?>covaqsol"><img src="<?php echo($pach);?>img/disc.png" alt=""></span>
                        <span>Covaq Solidário</span> </a>
                    </li>
                    <li>
                        <a href="<?php echo($pach)?>financas"><img src="<?php echo($pach)?>img/finança.png" alt=""></span>
                        <span>Finanças</span> </a>
                    </li>
                    <li>
                        <a href="<?php echo($pach)?>patrimonio"><img src="<?php echo($pach)?>img/box.png" alt=""></span>
                        <span>Património</span> </a>
                    </li>
                    <li>    
                        <a href="<?php echo($pach)?>ctic"><img src="<?php echo($pach);?>img/ctic.png" alt=""><span>CTic</span> 
                        </a>
                    </li>
                    <li>    
                        <a href="<?php echo($pach)?>portal"><img src="<?php echo($pach);?>img/portal.png" alt=""><span>Portal Covaq</span> 
                        </a>
                    </li>
                </ul>
               
            </div>
            
        </div>
         
    </body>   
</html>