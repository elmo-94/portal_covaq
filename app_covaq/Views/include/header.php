<?php
include 'config.php';

//include 'protect.php';

if(isset($_POST["sair"])){
    //if(!isset($_SESSION)) 
        session_start();
    
    session_destroy();
    unset($_SESSION['usuario']);
    header("Location: app_covaq");
};
?>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo($pach)?>style/style.css">
        <link rel="stylesheet" href="<?php echo($pach)?>style/print.css">
        <link rel="stylesheet" href="<?php echo($pach)?>style/dropdown-menu.css">
    </head>
    <body>
    <header class="no-print">
            <h2>
                <label for="nav-toggle">
                        <!-- <span class="las la-bars"></span> -->
                        <img src="<?php echo($pach);?>img/menu.png" alt="">
                </label>
           <?php 
           echo 'iChurch';
           if(isset($_SESSION['usuario'])){
               $_SESSION['titulo']='';
               echo $_SESSION['titulo'];
           } 
           ?> 
            </h2>
            <!--
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Buscar...">                    
            </div>
            -->
            <div class="user-wrapper">
               
                <div>
                    <h4><?php echo $_SESSION['usuario'] ?> </h4>
                    <small><?php echo $_SESSION['email']; ?></small> 
                    
                </div>
                <img src="<?php echo $pach. 'img/fotos/'.$_SESSION['foto'];?>" onclick="dropwDown_Mneu()" width="40" height="40" alt="">
                
                <form method="POST" action="">
                        <input type="Button" name="sair" value="Sair"> 
                        <img src="<?php echo($pach);?>img/sair.png" name="sair" width="16" height="16" alt="" 
                        onclick="Javascript: if(confirm('Tem certeza que deseja terminar esta sessão ?')) {
                        location.href='index.php'}">
                </form>
                
            </div>  
            
            <div class="menu">
                <h3>SIGE<br> <span>Gestão de Igreja</span></h3>
                <ul>
                    <li onclick="dropwDown_Mneu()"><img src="<?php echo($pach)?>img/user2.png" alt=""><a href="<?php echo($pach)?>usuarios">Gerir usuários</a></li>
                    <li><img src="<?php echo($pach);?>img/message.png" alt=""><a href="#">Informações</a></li>
                    <li><img src="<?php echo($pach);?>img/setting.png" alt=""><a href="#">Configuração</a></li>
                    <li><img src="<?php echo($pach);?>img/help.png" alt=""><a href="#">Ajuda</a></li>
                    <li><img src="<?php echo($pach);?>img/logout.png" alt="">
                        <a href="#" onclick="Javascript: if(confirm('Tem certeza que deseja terminar esta sessão ?'))
                        ">Sair</a></li>
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
