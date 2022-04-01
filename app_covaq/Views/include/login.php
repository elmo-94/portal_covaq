<?php 

include 'config.php';


/*
include('Model/conexao.php');
if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_user'] = $usuario['id_user'];
            $_SESSION['usuario'] = $usuario['usuario'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nivel'] = $usuario['nivel'];

            header("Location: Views/include/painel.php");

        } else {
            $erro ="Usuário ou senha incorreta";
        }

    }

}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $pach?>style/login.css">
    <title>App-Covaq</title>
</head>
<body>
    <div id="login-form" class="login-page">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" onclick="login()" class="toggle-btn">Login</button>
                <button type="button" onclick="registar()" class="toggle-btn">Registar</button>
            </div>
            
            <form method="POST" action="<?php echo $pach?>home/login" id="login" class="input-group-login" >
                <div>
                    <input type="text" value="<?php if(isset($_POST['email'])) if(isset($_SESSION['email'])) echo $_SESSION['email']?>"   name="email" class="input-field" placeholder="Usuário ou Email" require>
                    <input type="password" name="senha" class="input-field" placeholder="Senha" require>                              
                    <a href="esqueceu_senha.php"><p>Esqueceu sua senha?</p></a>
                    <input type="checkbox" class="check-box">
                    
                    <span>Lembrar senha</span>
                    <button type="submit" class="submit-btn">Entrar</button>
                </div>
                <div>
                    <?php 
                    
                    if(isset($_POST['email'])){

                        print_r($dadosModel);exit;
                       
                    }
                    
                    ?>
                </div>
                           
            </form>
            
            <form id="register" class="input-group-login" action="<?php echo $pach?>usuarios/cadastrar" method="POST">
                <input type="text" name="usuario" id="nome" class="input-field" placeholder="Nome do usuário" require>
                <input type="email" name="email" id="email" class="input-field" placeholder="Email" require>
                <input type="number" name="nivel" id="nivel" class="input-field" placeholder="nivel" min="0" max="5" require>
                <input type="password" name="senha" id="senha" class="input-field" placeholder="Senha" require>
                <input type="password" name="" id="conf_senha" class="input-field" placeholder="Confirmar Senha" require>
                <input type="checkbox" class="check-box">
                <span>Aceitar os termos e condições</span>
                <button type="submit" onclick="return validar()" class="submit-btn">Registar</button>
            </form>
        </div>
    </div>
    <script>
        var x=document.getElementById('login');
        var y=document.getElementById('register');
        var z=document.getElementById('btn');
        function registar(){
            x.style.left='400px';
            y.style.left='50px';
            z.style.left='110px';

        }
        function login(){
            x.style.left='50px';
            y.style.left='450px';
            z.style.left='0px';
        }
    </script>
    <script>
        var modal= document.getElementById('login-form');
        windows.onclick=function(event){
            if(event.target==modal){
                modal.style.diplay="none";
            }
        }
    </script>
    <script>

        function validar(){
            
            var nome = document.querySelector('#nome');
            var email = document.querySelector('#email');
            var senha = document.querySelector('#senha');
            var conf_senha = document.querySelector('#conf_senhaid');

            if (nome.value == "") {
                alert('Preencha o campo com seu nome');
                form1.nome.focus();
                return false;
            }
            if (nome.length < 5) {
                alert('Digite seu nome completo');
                form1.nome.focus();
                return false;
            }
            if (senha != conf_senha) {
                alert('Senhas diferentes');
                form1.senha.focus();
                return false;
            }
            }
        </script>

</body>
</html>