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
                <h2>Alterar Reparo</h2>

                <?php

                include_once 'conexao.php';

                $data_recebimento = $_POST['data_recebimento'];
                $data_previsao = $_POST['data_previsao'];
                $data_entrega = $_POST['data_entrega'];
                $mao_obra = $_POST['mao_obra'];
                $custo_peca = $_POST['custo_peca'];
                $valor_total = $_POST['valor_total'];
                $observacao = $_POST['observacao'];
                $status_id_status = $_POST['id_status'];
                $tecnico_id_tecnico = $_POST['id_tecnico'];
                $eletronico_id_eletronico = $_POST['id_eletronico'];
                $id_reparo = $_POST['id_reparo'];

                //echo "ID eletronico_id_eletronico:".$eletronico_id_eletronico." "; echo "ID reparo :".$id_reparo." "; echo "ID status_id_status :".$status_id_status." ";echo "ID id_tecnico :".$tecnico_id_tecnico." ";

                $alterar_reparo = $conexao->prepare("UPDATE `reparo` 
                LEFT JOIN `status`
                ON status_id_status = id_status
                LEFT JOIN `tecnico`
                ON tecnico_id_tecnico = id_tecnico
                LEFT JOIN `eletronico`
                ON eletronico_id_eletronico = id_eletronico
                SET    `data_recebimento` = :data_recebimento,
                       `data_previsao` = :data_previsao,
                       `data_entrega` = :data_entrega,
                       `mao_obra` = :mao_obra,
                       `custo_peca` = :custo_peca,
                       `valor_total` = :valor_total,
                       `observacao` = :observacao,
                       `status_id_status` = :status_id_status,
                       `tecnico_id_tecnico` = :tecnico_id_tecnico,
                       `eletronico_id_eletronico` = :eletronico_id_eletronico
                WHERE `reparo`.`id_reparo` = :id_reparo");

                $alterar_reparo->execute(array(
                    ':data_recebimento' => $_POST['data_recebimento'],
                    ':data_previsao' => $_POST['data_previsao'],
                    ':data_entrega' => $_POST['data_entrega'],
                    ':mao_obra' => $_POST['mao_obra'],
                    ':custo_peca' => $_POST['custo_peca'],
                    ':valor_total' => $_POST['valor_total'],
                    ':observacao' => $_POST['observacao'],
                    ':status_id_status' => $_POST['id_status'],
                    ':tecnico_id_tecnico' => $_POST['id_tecnico'],
                    ':eletronico_id_eletronico' => $_POST['id_eletronico'],
                    ':id_reparo' => $_POST['id_reparo']
                ));
               
                ?>

                <table border="1">
                    <tr>
                        <th>Data de Recebimento</th>
                        <th>Data de Previsão</th>
                        <th>Data de Entrega</th>
                        <th>Mão de Obra</th>
                        <th>Custo de Peça</th>
                        <th>Valor Total</th>
                        <th>Observação</th>
                        <th>Status</th>
                        <th>Técnico</th>
                        <th>Modelo</th>
                    </tr>

                    <?php

                        $consulta_reparo = $conexao->query("SELECT * FROM reparo
                        LEFT JOIN `status`
                        ON status_id_status = id_status
                        LEFT JOIN `tecnico`
                        ON tecnico_id_tecnico = id_tecnico
                        LEFT JOIN `eletronico`
                        ON eletronico_id_eletronico = id_eletronico
                        WHERE id_reparo = $id_reparo");

                        $lista = $consulta_reparo->fetch(PDO::FETCH_ASSOC);
                        
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
                    </tr>
                </table>
            </div>
        </section>
    </main>
    <footer>
        <h6>Registrado</h6>
    </footer>
</body>

</html>