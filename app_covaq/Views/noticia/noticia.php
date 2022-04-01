<h1>NOTíCIA EM PRIMEIRA MÃO</h1>


<a href="noticia/desporto">Desporto</a>
<a href="user.php">Entreterimento</a>
<a href="user.php">Informação</a>
<table border="2px">
    <thead>
    <tr>
        <td>Usuário</td>
        <td>Email</td>
        <td>Senha</td>
        <td>Nivel</td>
    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $i < count($this->dados2); $i++) { ?>
        <tr>
            <td><?php echo $this->dados2[$i]['usuario']; ?></td>
            <td><?php echo $this->dados2[$i]['email']; ?></td>
            <td><?php echo $this->dados2[$i]['senha']; ?></td>
            <td><?php echo $this->dados2[$i]['nivel']; ?></td>
        </tr>
    <?php
    }
    ?> 
    </tbody>
</table>
