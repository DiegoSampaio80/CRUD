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

                    $data_recebimento = $_POST['data_recebimento'];
                    $data_previsao = $_POST['data_previsao'];
                    $data_entrega = $_POST['data_entrega'];
                    $mao_obra = $_POST['mao_obra'];
                    $custo_peca = $_POST['custo_peca'];
                    $valor_total = $_POST['valor_total'];
                    $observacao = $_POST['observacao'];
                    $nome_status = $_POST['nome_status'];
                    $nome_tecnico = $_POST['nome_tecnico'];
                    $id_eletronico = $_POST['id_eletronico'];
                   
                ?>

                <table border="1">
                    <tr>
                        <th>Data Recebimento</th>
                        <th>Data Previsao</th>
                        <th>Data de Entrega</th>
                        <th>Mão de Obra</th>
                        <th>Custo da Peça</th>
                        <th>Valor Total</th>
                        <th>Observação</th>
                        <th>Status</th>
                        <th>Técnico</th>
                        <th>Eletrônico</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>

                    <?php
                 
                        $consulta_reparo = $conexao->query("SELECT
                        data_recebimento, data_previsao, data_entrega, mao_obra, custo_peca, valor_total,
                        observacao, nome_status, nome_tecnico, modelo, id_reparo, id_tecnico, id_status, id_eletronico
                        FROM `reparo` 
                        LEFT JOIN `status` 
                        ON id_status = status_id_status 
                        LEFT JOIN `tecnico` 
                        ON id_tecnico = tecnico_id_tecnico 
                        LEFT JOIN `eletronico` 
                        ON id_eletronico = eletronico_id_eletronico
                        WHERE `data_recebimento` LIKE '%$data_recebimento%' 
                        AND `data_previsao` LIKE '%$data_previsao%' 
                        AND `data_entrega` LIKE '%$data_entrega%' 
                        AND `mao_obra` LIKE '%$mao_obra%' 
                        AND `custo_peca` LIKE '%$custo_peca%' 
                        AND `valor_total` LIKE '%$valor_total%' 
                        AND `observacao` LIKE '%$observacao%' 
                        AND `nome_status` LIKE '%$nome_status%' 
                        AND `nome_tecnico` LIKE '%$nome_tecnico%' 
                        AND `id_eletronico` LIKE '%$id_eletronico%'
                        ");
 
                        While($lista = $consulta_reparo->fetch(PDO::FETCH_ASSOC)){
                            
                    ?>
                        <tr>
                            <td><?php echo $lista["data_recebimento"]; ?></td>
                            <td><?php echo $lista["data_previsao"]; ?></td>
                            <td><?php echo $lista["data_entrega"]; ?></td>
                            <td><?php echo $lista["mao_obra"]; ?></td>
                            <td><?php echo $lista["custo_peca"]; ?></td>
                            <td><?php echo $lista["valor_total"]; ?></td>
                            <td><?php echo $lista["observacao"]; ?></td>
                            <td><?php echo $lista["nome_status"]; ?></td>
                            <td><?php echo $lista["nome_tecnico"]; ?></td>
                            <td><?php echo $lista["modelo"]; ?></td>
                            <td><a href="alterar_reparo.php?alterar=<?php echo $lista['id_reparo']; ?>">Alterar</a></td>
                            <td><a href="excluir_reparo.php?excluir=<?php echo $lista['id_reparo']; ?>">Excluir</a></td>
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