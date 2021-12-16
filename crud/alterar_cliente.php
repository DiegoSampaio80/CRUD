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
                
                $nome_completo = $_GET['alterar'];
            
                $consulta_cliente = $conexao->query("SELECT * FROM cliente LEFT JOIN endereco 
                ON endereco_id_endereco = id_endereco WHERE nome_completo = '$nome_completo'");
                $lista = $consulta_cliente->fetch(PDO::FETCH_ASSOC);

                
            ?>

            <img src="./background-technologia-celular.jpg" alt="">
            <div  class="table">
            <form action="./alterar_cliente_processar.php" method="GET"  >
            <h2>Alterar Cadastro Cliente</h2>
                <label for="nome_completo">
                    <p>Nome: <input type="text" name="nome_completo" value="<?php echo $lista['nome_completo'] ;?>" readonly></p>
                </label>
                <label for="telefone_celular">
                    <p>Celular: <input type="text" name="telefone_celular" value="<?php echo $lista['telefone_celular'] ;?>"></p>
                </label>   
                <label for="telefone_contato">
                    <p>Contato: <input type="text" name="telefone_contato" value="<?php echo $lista['telefone_contato'] ;?>"></p>
                </label>   
                <label for="rua">
                    <p>Rua: <input type="text" name="rua" value="<?php echo $lista['rua'] ;?>"></p>
                </label>   
                <label for="complemento">
                    <p>Complemento: <input type="text" name="complemento" value="<?php echo $lista['complemento'] ;?>"></p>
                </label>
                <label for="bairro">
                    <p>Bairro: <input type="text" name="bairro" value="<?php echo $lista['bairro'] ;?>"></p>
                </label>
                <label for="cidade">
                    <p>Cidade: <input type="text" name="cidade" value="<?php echo $lista['cidade'] ;?>"></p>
                </label>
                <label for="uf">
                    <p>UF: <input type="text" name="uf" value="<?php echo $lista['uf'] ;?>"></p>
                </label>
                <label for="cep">
                    <p>CEP: <input type="text" name="cep" value="<?php echo $lista['cep'] ;?>"></p>
                </label>
                <label for="id_cliente">
                    <p><input type="hidden" name="id_cliente" value="<?php echo $lista['id_cliente'] ;?>"></p>
                </label>
                <label for="endereco_id_endereco">
                    <p><input type="hidden" name="endereco_id_endereco" value="<?php echo $lista['endereco_id_endereco'] ;?>"></p>
                </label>
                <label for="id_endereco">
                    <p><input type="hidden" name="id_endereco" value="<?php echo $lista['id_endereco'] ;?>"></p>
                </label>                
                <button type="submit" name="botao_enviar" class="inputCadastroCliente btn">Enviar</button>
            </form>
        </div>
        </section>
    </main>
    <footer>
        <h6>Registrado</h6>
    </footer>   

</body>
</html>