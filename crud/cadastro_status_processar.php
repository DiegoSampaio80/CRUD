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

                $nome_status = $_GET['nome_status'];
                echo "nome status: ".$nome_status;
                $cadastro_status = $conexao->prepare('INSERT INTO `status` (`nome_status`)
                VALUES(:nome_status);');

                $cadastro_status->execute(array(
                    ':nome_status' => $nome_status
            
                ));

                /* INSERT INTO `status` (`id_status`, `nome_status`) VALUES (NULL, 'Aguardando') */
                // conta as linhas retorna 1 para cadastrado e 0 para não cadastrado 
                if ($cadastro_status->rowCount() > 0) {

                    // caso quiser usar sessão que é muito mais util ao invez do echo. 
                    //Ao usar header ele redireciona sem mostrar a mensagem
                    // session_start(); $_SESSION['mensagem'] = 'Cadastro Feito com Sucesso!';

                   /*  echo 'Eletrônico cadastrado com Sucesso!'; */

                    $id_status = $conexao->lastInsertId();

                    $consulta_status = $conexao->query("SELECT nome_status FROM `status` WHERE id_status = $id_status");

                    $lista = $consulta_status->fetch(PDO::FETCH_ASSOC)

                ?>
                    <div class="table">
                        <p>Status cadastrado com Sucesso!</p>
                        <table border="1" border-collapse = "colapse">
                            <thead>
                                <tr>
                                    <th>Nome Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $lista['nome_status']; ?></td>
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