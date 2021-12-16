<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cliente</title>
</head>
<body>
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
    <?php 
        include_once 'conexao.php';
    ?>
    
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
                <form action="./cadastro_tecnico_processar.php" method="GET" id="formCadastroCliente">
                    <h2>
                        Cadastro Técnico
                    </h2>
                    <label for="nome_tecnico" class="inputCadastroCliente">Nome: </label>
                    <input type="text" class="inputCadastroCliente" name="nome_tecnico" id="nome_tecnico"><br>

                    <label for="telefone_tecnico" class="inputCadastroCliente">Telefone: </label>
                    <input type="text" class="inputCadastroCliente" name="telefone_tecnico" id="telefone_tecnico"><br> 

                    <label for="cep" class="inputCadastroCliente">CEP: </label>
                    <input type="text" class="inputCadastroCliente" name="cep" id="cep" value=""><br> 
                    
                    <label for="rua" class="inputCadastroCliente">Rua: </label>
                    <input type="text" class="inputCadastroCliente" name="rua" id="rua" value=""><br>
                    
                    <label for="complemento" class="inputCadastroCliente">Complemento: </label>
                    <input type="text" class="inputCadastroCliente" name="complemento" id="complemento" value=""><br>
                    
                    <label for="bairro" class="inputCadastroCliente">Bairro: </label>
                    <input type="text" class="inputCadastroCliente" name="bairro" id="bairro" value=""><br>
                    
                    <label for="cidade" class="inputCadastroCliente">Cidade: </label>
                    <input type="text" class="inputCadastroCliente" name="cidade" id="cidade" value=""><br>
                    
                    <label for="uf" class="inputCadastroCliente">UF: </label>
                    <input type="text" class="inputCadastroCliente" name="uf" id="uf" value=""><br>
                    
                    <button type="submit" onclick="capturar()" value="capturar">Cadastrar</button>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <h6>Registrado</h6>
    </footer>
    <script>


  /*        addEventListener("click", function(event){
            event.preventDefault();
        }) */
/*
        function capturar(){
            
            let nome = document.getElementById('nome').value;
            let celular = document.getElementById('celular').value;
            let contato = document.getElementById('contato').value;
            let endereço = document.getElementById('endereço').value;
            console.log(nome, celular, contato, endereço)
        }
        capturar() */

    </script>
</body>
</html>
</body>
</html>