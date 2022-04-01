<?php
    //include('protect.php');
    //include('Model/conexao.php');
    include 'config.php';
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
                <h2> <img src="<?php echo($pach)?>img/church.png" alt=""></span><span> Covaq-App</span></h2>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="#"><img src="<?php echo($pach);?>img/dashboard.png" alt="">
                            <span>Dashboard</span> </a>
                    </li>
                    <li>
                        <a  href="#">                             
                            <img src="<?php echo($pach)?>img/admin.png" alt=""></span>
                            <span>Administração</span> 
                        </a>
                    </li>
                    <li>
                        <a href="#"><img src="<?php echo($pach);?>img/study.png" alt=""></span>
                        <span>Discipulado</span> </a>
                    </li>
                    <li>
                        <a href="#"><img src="<?php echo($pach);?>img/disc.png" alt=""></span>
                        <span>Covaq Solidário</span> </a>
                    </li>
                    <li>
                        <a href="#"><img src="<?php echo($pach)?>img/finança.png" alt=""></span>
                        <span>Finanças</span> </a>
                    </li>
                    <li>
                        <a href="#"><img src="<?php echo($pach)?>img/box.png" alt=""></span>
                        <span>Património</span> </a>
                    </li>
                    <li>    
                        <a href="#><img src="<?php echo($pach);?>img/ctic.png" alt=""><span>CTic</span> 
                        </a>
                    </li>
                    <li>    
                        <a href="#"><img src="<?php echo($pach);?>img/ctic.png" alt=""><span>Portal Covaq</span> 
                        </a>
                    </li>
                </ul>
               
            </div>
            
        </div>
         
    </body>   
</html>