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
                <li><a href="./cadastro_status.php" class="aside">Sou funcionário</a></li>
                <li><a href="./consultar_status.php" class="aside">Sou Cliente</a></li>
            </ul>
        </aside>
        <section>
            <img src="./background-technologia-celular.jpg" alt="">
            <div class="table">
                <form action="./cadastro_tecnico_processar.php" method="GET" id="formCadastroCliente">
                    <h2>Login</h2>
                    
                    <label for="usuario" class="inputCadastroCliente">Usuário: </label>
                    <input type="text" class="inputCadastroCliente" name="usuario" id="usuario"><br>

                    <label for="senha" class="inputCadastroCliente">Senha: </label>
                    <input type="text" class="inputCadastroCliente" name="senha" id="senha"><br> 

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