<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <title>Sistema Manutenção de Celular 1.0</title>
</head>

<body>
    <header>
        <img class="logotipo" src="./background-technologia-celular.jpg" alt="logotipo">
        <h1>Manutenção de Celular</h1>
        <input type="search" placeholder="Busca">
    </header>
    <main>
        <aside>
            <ul>
                <li><a href="./cadastro_status.php" class="aside">Cadastro Status</a></li>
                <li><a href="./consultar_status.php" class="aside">Consulta Status</a></li>
                <li><a href="./cadastro_reparo.php" class="aside">Cadastro Reparo</a></li>
                <li><a href="./consultar_reparo.php" class="aside">Consulta Reparo</a></li>
                <li><a href="./cadastro_eletronico.php" class="aside">Cadastro Eletrônico</a></li>
                <li><a href="./consultar_eletronico.php" class="aside">Consulta Eletrônico</a></li>
                <li><a href="./cadastro_cliente.php" class="aside">Cadastro Cliente</a></li>
                <li><a href="./consultar_cliente.php" class="aside">Consulta Cliente</a></li>
                <li><a href="./cadastro_tecnico.php" class="aside">Cadastro Técnico</a></li>
                <li><a href="./consultar_tecnico.php" class="aside">Consulta Técnico</a></li>
                <li><a href="./cadastro_endereco.php" class="aside">Cadastro Endereço</a></li>
                <li><a href="./consultar_endereco.php" class="aside">Consulta Endereço</a></li>
            </ul>
        </aside>
        <section class="sectionTable">
            <img src="./background-technologia-celular.jpg" alt="">

            <div class="table">
                <h2>Consultar Técnico</h2>

                <?php

                    include_once 'conexao.php';

                    $nome_tecnico = $_POST['nome_tecnico'];

                ?>

                <table border="1">
                    <tr>
                    <th>Nome Técnico</th>
                        <th>Telefone</th>
                        <th>Rua</th>
                        <th>Complemento</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                        <th>Alterar Técnico</th>
                        <th>Excluir Técnico</th>
                    </tr>

                    <?php
                 
                        $consulta_tecnico = $conexao->query("SELECT * FROM `tecnico` 
                        WHERE `nome_tecnico` LIKE '%$nome_tecnico%'");
 
                        While($lista = $consulta_tecnico->fetch(PDO::FETCH_ASSOC)){
                            
                    ?>
                        <tr>
                            <td><?php echo $lista["nome_tecnico"]; ?></td>
                            <td><?php echo $lista['telefone_tecnico']; ?></td>
                            <td><?php echo $lista['rua']; ?></td>
                            <td><?php echo $lista['complemento']; ?></td>
                            <td><?php echo $lista['bairro']; ?></td>
                            <td><?php echo $lista['cidade']; ?></td>
                            <td><?php echo $lista['uf']; ?></td>
                            <td><?php echo $lista['cep']; ?></td>
                            <td><a href="alterar_tecnico.php?alterar=<?php echo $lista['id_tecnico']; ?>">Alterar</a></td>
                            <td><a href="excluir_tecnico.php?excluir=<?php echo $lista['id_tecnico']; ?>">Excluir</a></td>
                        </tr>
                    <?php 
                    }
                    ?>
                </table>   
            </div>
        </section>
    </main>
    <footer>
        <h6>Registrado</h6>
    </footer>
</body>
</html>