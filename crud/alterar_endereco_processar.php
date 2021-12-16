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
                <h2>Alterar Endereço</h2>

                <?php

                include_once 'conexao.php';

                $rua = $_GET['rua'];
                $complemento = $_GET['complemento'];
                $bairro = $_GET['bairro'];
                $cidade = $_GET['cidade'];
                $uf = $_GET['uf'];
                $cep = $_GET['cep'];
                $id_endereco = $_GET['id_endereco'];

                $cadastro_endereco = $conexao->prepare("UPDATE `endereco`
                    SET `rua` = :rua,
                    `complemento` = :complemento,
                    `bairro` = :bairro,
                    `cidade`= :cidade,
                    `uf` = :uf,
                    `cep` = :cep
                    WHERE `endereco`.`id_endereco` = :id_endereco
                ");

                $cadastro_endereco->execute(array(
                    ':rua' => $_GET['rua'],
                    ':complemento' => $_GET['complemento'],
                    ':bairro' => $_GET['bairro'],
                    ':cidade' => $_GET['cidade'],
                    ':uf' => $_GET['uf'],
                    ':cep' => $_GET['cep'],
                    ':id_endereco' => $_GET['id_endereco']//tem que colocar senão aparecem mensagem de token
                ));

                ?>

                    <table border="1" border-collapse = "colapse">
                        <thead>
                            <tr>
                                <th>Rua</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>CEP</th>
                                <th>Alterar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>

                    <?php

                        $consulta_endereco = $conexao->query("SELECT * FROM `endereco`
                            WHERE id_endereco = '$id_endereco'"
                        );

                        $lista = $consulta_endereco->fetch(PDO::FETCH_ASSOC);
                        
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $lista['rua']; ?></td>
                                <td><?php echo $lista['complemento']; ?></td>
                                <td><?php echo $lista['bairro']; ?></td>
                                <td><?php echo $lista['cidade']; ?></td>
                                <td><?php echo $lista['uf']; ?></td>
                                <td><?php echo $lista['cep']; ?></td>
                                <td><a href="alterar_endereco.php?alterar=<?php echo $lista['id_endereco']; ?>">Alterar</a></td>
                                <td><a href="excluir_endereco.php?excluir=<?php echo $lista['id_endereco']; ?>">Excluir</a></td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </section>
    </main>
    <footer>
        <h6>Registrado</h6>
    </footer>
</body>

</html>