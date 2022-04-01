<?php
include("conexao.php");

if(isset($_POST['ok'])){
   
    $email=$mysqli->escape_string($_POST['email']);

    if(!filter_var($email,FILTER_VALIDADE_EMAIL)){

        $erro[]="Email inválido !";
    }

    $sql_code="SELECT id_user,senha,email FROM usuarios WHERE email= '$_SESSION[email]'";
    $sql_query=$mysqli->query($sql_code) or die ($mysqli->error);
    $dado=$sql_query->fetch_assoc();
    $total=$sql_query->num_rows;

    if($total==0)
        $erro[]="O e-mail informado não existe no banco de dados";

    if(count($erro)==0  && $total>0){

        $novasenha=substr(md5(md5(time)),0,6);
        $nscriptografada=md5(md5($novasenha));

        if (main(($email),"Sua nova senha","Sua nova Senha: ".$novasenha)){
            $sql_code= "UPDATE usuarios SET senha = '$nscriptografada' WHERE email ='$emal'";
            $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
        }

}
}
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['ok'])){
    if(count($erro)>0)
        foreach($erro as $msg){
            echo "<p>$msg</p>";
        } 
    }    
    ?>
    <form method="POST" action="">
        <input name="email" pleceholder="Email" type="text" >
       
       <input name="ok" value="Enviar" type="submit">
    </form>
</body>
</html>