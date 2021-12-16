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
            <div class="table">
                <?php

                include_once 'conexao.php';

                $nome_completo = $_POST['nome_completo'];
                $telefone_celular = $_POST['telefone_celular'];
                $telefone_contato = $_POST['telefone_contato'];
                /* $endereco_id_endereco = $id_endereco; */
                $cep = $_POST['cep'];
                $cidade = $_POST['cidade'];
                $uf = $_POST['uf'];
                $bairro = $_POST['bairro'];
                $rua = $_POST['rua'];
                $complemento = $_POST['complemento'];

                $cadastro_endereco = $conexao->prepare("INSERT INTO `endereco` (`cep`, `cidade`, `uf`, 
                `bairro`, `rua`, `complemento`) 
                VALUES (:cep, :cidade, :uf, :bairro, :rua, :complemento);");

                $cadastro_endereco->execute(array(
                    ':cep' => $cep,
                    ':cidade' => $cidade,
                    ':uf' => $uf,
                    ':bairro' => $bairro,
                    ':rua' => $rua,
                    ':complemento' => $complemento
                ));

                $id_endereco = $conexao->lastInsertId();

                $cadastro_cliente = $conexao->prepare("INSERT INTO `cliente` (`nome_completo`,`telefone_celular`,
                `telefone_contato`,`endereco_id_endereco`)
                VALUES(:nome_completo, :telefone_celular, :telefone_contato, :endereco_id_endereco);");

                $cadastro_cliente->execute(array(
                    ':nome_completo' => $nome_completo,
                    ':telefone_celular' => $telefone_celular,
                    ':telefone_contato' => $telefone_contato,
                    ':endereco_id_endereco' => $id_endereco
                ));

                // conta as linhas retorna 1 para cadastrado e 0 para não cadastrado 
                if ($cadastro_cliente->rowCount() > 0 && $cadastro_endereco->rowCount() > 0) {

                    // caso quiser usar sessão que é muito mais util ao invez do echo. 
                    //Ao usar header ele redireciona sem mostrar a mensagem
                    // session_start(); $_SESSION['mensagem'] = 'Cadastro Feito com Sucesso!';

                    echo 'Cadastro feito com Sucesso!';

                    $id_cliente = $conexao->lastInsertId();

                    $consulta_cliente = $conexao->query("SELECT * FROM cliente LEFT JOIN endereco 
                        ON endereco_id_endereco = id_endereco WHERE id_cliente = $id_cliente");

                    $lista = $consulta_cliente->fetch(PDO::FETCH_ASSOC)

                ?>

                    <table style="border: 2px solid; border-collapse: colapse">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Celular</th>
                                <th>Contato</th>
                                <th>Rua</th>
                                <th>Complemento</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>CEP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $lista['nome_completo']; ?></td>
                                <td><?php echo $lista['telefone_celular']; ?></td>
                                <td><?php echo $lista['telefone_contato']; ?></td>
                                <td><?php echo $lista['rua']; ?></td>
                                <td><?php echo $lista['complemento']; ?></td>
                                <td><?php echo $lista['bairro']; ?></td>
                                <td><?php echo $lista['cidade']; ?></td>
                                <td><?php echo $lista['uf']; ?></td>
                                <td><?php echo $lista['cep']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    
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