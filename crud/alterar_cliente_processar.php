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
                <h2>Consultar Cliente</h2>

                <?php

                include_once 'conexao.php';

                $nome_completo = $_GET['nome_completo'];
                $telefone_celular = $_GET['telefone_celular'];
                $telefone_contato = $_GET['telefone_contato'];
                $id_cliente = $_GET['id_cliente'];
                $rua = $_GET['rua'];
                $complemento = $_GET['complemento'];
                $bairro = $_GET['bairro'];
                $cidade = $_GET['cidade'];
                $uf = $_GET['uf'];
                $cep = $_GET['cep'];
                $id_endereco = $_GET['id_endereco'];

                /* echo "nome_completo: ".$nome_completo."<br>";
                echo "telefone_celular: " . ($telefone_celular . "<br>");
                echo "telefone_contato: ".$telefone_contato."<br>";
                echo "id_cliente: " . ($id_cliente . "<br>");
                echo "id_endereco: " . ($id_endereco . "<br>"); */

                $alterar_cliente = $conexao->prepare("UPDATE cliente 
                LEFT JOIN endereco 
                ON endereco_id_endereco = id_endereco 
                SET nome_completo = :nome_completo, 
                telefone_celular = :telefone_celular, 
                telefone_contato = :telefone_contato,
                id_cliente = :id_cliente,
                rua = :rua,
                complemento = :complemento,
                bairro = :bairro,
                cidade = :cidade,
                uf = :uf,
                cep = :cep, 
                id_endereco = :id_endereco 
                WHERE id_cliente = :id_cliente");

                $alterar_cliente->execute(array(
                    ':nome_completo' => $_GET['nome_completo'],
                    ':telefone_celular' => $_GET['telefone_celular'],
                    ':telefone_contato' => $_GET['telefone_contato'],
                    ':id_cliente' => $_GET['id_cliente'],
                    ':rua' => $_GET['rua'],
                    ':complemento' => $_GET['complemento'],
                    ':bairro' => $_GET['bairro'],
                    ':cidade' => $_GET['cidade'],
                    ':uf' => $_GET['uf'],
                    ':cep' => $_GET['cep'],
                    ':id_endereco' => $_GET['id_endereco']
                ));
                ?>

                <table border="1">
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

                    <?php

                    $alterar_cliente = $conexao->query("SELECT * FROM cliente LEFT JOIN endereco 
                        ON endereco_id_endereco = id_endereco WHERE id_cliente = $id_cliente");

                    $lista = $alterar_cliente->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <tr>
                        <td><?php echo $lista["nome_completo"]; ?></td>
                        <td><?php echo $lista["telefone_celular"]; ?></td>
                        <td><?php echo $lista["telefone_contato"]; ?></td>
                        <td><?php echo $lista["rua"]; ?></td>
                        <td><?php echo $lista["complemento"]; ?></td>
                        <td><?php echo $lista["bairro"]; ?></td>
                        <td><?php echo $lista["cidade"]; ?></td>
                        <td><?php echo $lista["uf"]; ?></td>
                        <td><?php echo $lista["cep"]; ?></td>
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