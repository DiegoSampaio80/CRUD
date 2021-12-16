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
                
                $id_eletronico = $_GET['excluir'];
               
                $consultar_eletronico = $conexao->query("SELECT * FROM eletronico 
                WHERE id_eletronico = '$id_eletronico'");
                $lista = $consultar_eletronico->fetch(PDO::FETCH_ASSOC);
                
            ?>

            <img src="./background-technologia-celular.jpg" alt="">
            <div  class="table">
            <form action="./excluir_eletronico_processar.php" method="GET"  >
            <h2>Excluir Cadastro Eletrônico</h2>
                <label for="modelo">
                    <p>Modelo: <input type="text" name="modelo" value="<?php echo $lista['modelo'] ;?>"></p>
                </label>
                <label for="marca">
                    <p>Marca: <input type="text" name="marca" value="<?php echo $lista['marca'] ;?>"></p>
                </label>   
                <label for="numero">
                    <p>Número: <input type="text" name="numero" value="<?php echo $lista['numero'] ;?>"></p>
                </label>   
                <label for="descricao">
                    <p>Descrição: <input type="text" name="descricao" value="<?php echo $lista['descricao'] ;?>"></p>
                </label>   
                <label for="id_eletronico">
                    <p><input type="hidden" name="id_eletronico" value="<?php echo $lista['id_eletronico'] ;?>"></p>
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