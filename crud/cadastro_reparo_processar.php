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
        <section>
            <img src="./background-technologia-celular.jpg" alt="">
            <div id="areaCadastroCliente">
                <?php

                include_once 'conexao.php';

                $data_recebimento = $_POST['data_recebimento'];
                $data_previsao = $_POST['data_previsao'];
                $data_entrega = $_POST['data_entrega'];
                $mao_obra = $_POST['mao_obra'];
                $custo_peca = $_POST['custo_peca'];
                $valor_total = $_POST['valor_total'];
                $observacao = $_POST['observacao'];
                $status_id_status = $_POST['status_id_status'];
                $tecnico_id_tecnico = $_POST['tecnico_id_tecnico'];
                $eletronico_id_eletronico = $_POST['eletronico_id_eletronico'];

                $cadastro_reparo = $conexao->prepare('INSERT INTO `reparo` (`data_recebimento`, `data_previsao`,
                `data_entrega`, `mao_obra`, `custo_peca`, `valor_total`, `observacao`, `status_id_status`, 
                `tecnico_id_tecnico`, `eletronico_id_eletronico`)
                VALUES(:data_recebimento, :data_previsao, :data_entrega, :mao_obra, :custo_peca, :valor_total, 
                :observacao, :status_id_status, :tecnico_id_tecnico, :eletronico_id_eletronico);');

                $cadastro_reparo->execute(array(
                    ':data_recebimento' => $data_recebimento,
                    ':data_previsao' => $data_previsao,
                    ':data_entrega' => $data_entrega,
                    ':mao_obra' => $mao_obra,
                    ':custo_peca' => $custo_peca,
                    ':valor_total' => $valor_total,
                    ':observacao' => $observacao,
                    ':status_id_status' => $status_id_status,
                    ':tecnico_id_tecnico' => $tecnico_id_tecnico,
                    ':eletronico_id_eletronico' => $eletronico_id_eletronico
            
                ));

                // conta as linhas retorna 1 para cadastrado e 0 para não cadastrado 
                if ($cadastro_reparo->rowCount() > 0) {

                    // caso quiser usar sessão que é muito mais util ao invez do echo. 
                    //Ao usar header ele redireciona sem mostrar a mensagem
                    // session_start(); $_SESSION['mensagem'] = 'Cadastro Feito com Sucesso!';

                   /*  echo 'Eletrônico cadastrado com Sucesso!'; */

                    $id_reparo = $conexao->lastInsertId();

                    $consulta_reparo = $conexao->query("SELECT data_recebimento, data_previsao, data_entrega,
                     mao_obra, custo_peca, valor_total, observacao, nome_status, nome_tecnico, modelo 
                     FROM reparo 
                     LEFT JOIN `tecnico` 
                     ON tecnico.id_tecnico = reparo.tecnico_id_tecnico 
                     LEFT JOIN `eletronico` 
                     ON eletronico.id_eletronico = reparo.eletronico_id_eletronico 
                     LEFT JOIN `status` ON `status`.`id_status` = reparo.status_id_status 
                     WHERE id_reparo = $id_reparo");

                    $lista = $consulta_reparo->fetch(PDO::FETCH_ASSOC)

                ?>
                    <div class="table">
                        <p>Eletrônico cadastrado com Sucesso!</p>
                        <table border="1" border-collapse = "colapse">
                            <thead>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $lista['data_recebimento']; ?></td>
                                    <td><?php echo $lista['data_previsao']; ?></td>
                                    <td><?php echo $lista['data_entrega']; ?></td>
                                    <td><?php echo $lista['mao_obra']; ?></td>
                                    <td><?php echo $lista['custo_peca']; ?></td>
                                    <td><?php echo $lista['valor_total']; ?></td>
                                    <td><?php echo $lista['observacao']; ?></td>
                                    <td><?php echo $lista['nome_status']; ?></td>
                                    <td><?php echo $lista['nome_tecnico']; ?></td>
                                    <td><?php echo $lista['modelo']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php

                    // caso quiser redirecionar use o header do php 
                    //header('Location: formulario_cadastro.php');

                } else {

                    // caso quiser usar sessão que é muito mais util ao invez do echo. Ao usar header ele redireciona sem mostrar a mensagem
                    // session_start(); $_SESSION['mensagem'] = 'Erro ao Cadastrar!';  

                    echo 'Erro ao Cadastrar!';

                    // caso quiser redirecionar use o header do php 
                    //header('Location: formulario_cadastro.php');

                }
                ?>
               
            </div>
        </section>
    </main>
    <footer>
        <h6>Registrado</h6>
    </footer>
</body>

</html>