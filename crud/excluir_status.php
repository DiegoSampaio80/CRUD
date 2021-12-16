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
            <?php
                include_once 'conexao.php';
                
                $id_status = $_GET['excluir'];
               
                $consultar_status = $conexao->query("SELECT * FROM `status` WHERE id_status = '$id_status'");
                $lista = $consultar_status->fetch(PDO::FETCH_ASSOC);
                
            ?>

            <img src="./background-technologia-celular.jpg" alt="">
            <div  class="table">
            <form action="./excluir_status_processar.php" method="GET"  >
            <h2>Excluir Status</h2>
            <label for="nome_status" class="inputCadastroCliente">
                    <p>Nome Status: <input type="text" class="inputCadastroCliente" name="nome_status" id="nome_status" value="<?php echo $lista['nome_status'] ;?>"></p> 
                </label>
                <label for="id_status" class="inputCadastroCliente">
                    <input type="hidden" class="inputCadastroCliente" name="id_status" id="id_status" value="<?php echo $lista['id_status'] ;?>">
                </label>
                <button type="submit" name="botao_excluir" class="inputCadastroCliente btn">Excluir</button>
            </form>
        </div>
        </section>
    </main>
    <footer>
        <h6>Registrado</h6>
    </footer>   

</body>
</html>