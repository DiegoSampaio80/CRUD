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
                <h2>Excluir Reparo</h2>

                <?php

                    include_once 'conexao.php';
                    
                    $id_reparo = $_GET['id_reparo'];
    
                    $excluir_reparo = $conexao->prepare("DELETE FROM `reparo` 
                    WHERE id_reparo = :id_reparo");

                    $excluir_reparo->execute(array(
                    
                        ':id_reparo' => $_GET['id_reparo']

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
                    
                    $consultar_reparo = $conexao->query("SELECT * FROM reparo
                    WHERE id_reparo = $id_reparo");

                    while($lista = $consultar_reparo->fetch(PDO::FETCH_ASSOC)){
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