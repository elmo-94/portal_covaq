<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id_user'])) {
    die //("Você não pode acessar esta página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
    ("<script> alert('Você não pode acessar esta página porque não está logado'); location.href='index.php';</script>");
}

?>