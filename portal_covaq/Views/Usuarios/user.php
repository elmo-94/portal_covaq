<h1>Lista de usuários</h1>

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
    for ($i=0; $i < count($dados2); $i++) { ?>
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
