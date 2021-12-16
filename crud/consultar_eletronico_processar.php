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
                <h2>Consultar Eletrônico</h2>

                <?php

                    include_once 'conexao.php';

                    /* $id_eletronico = $_POST['id_eletronico']; */
                    $modelo = $_POST['modelo'];
                    $marca = $_POST['marca'];
                    $numero = $_POST['numero'];
                    $descricao = $_POST['descricao'];

                    echo $descricao;
                ?>

                <table border="1">
                    <tr>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Número</th>
                        <th>Descrição</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>

                    <?php
                       
                        $consulta_eletronico = $conexao->query("SELECT * FROM `eletronico` 
                        WHERE `modelo` LIKE '%$modelo%'
                        AND `marca` LIKE '%$marca%'
                        AND `numero` LIKE '%$numero%'
                        AND `descricao` LIKE '%$descricao%' 
                        ");                    
                    
                        While($lista = $consulta_eletronico->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <tr>
                            <td><?php echo $lista["modelo"]; ?></td>
                            <td><?php echo $lista["marca"]; ?></td>
                            <td><?php echo $lista["numero"]; ?></td>
                            <td><?php echo $lista["descricao"]; ?></td>
                            <td><a href="alterar_eletronico.php?alterar=<?php echo $lista['id_eletronico']; ?>">Alterar</a></td>
                            <td><a href="excluir_eletronico.php?excluir=<?php echo $lista['id_eletronico']; ?>">Excluir</a></td>
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