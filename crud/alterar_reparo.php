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
                
                $id_reparo = $_GET['alterar'];
                
                $consulta_reparo = $conexao->query("SELECT * FROM reparo
                WHERE id_reparo = '$id_reparo'");
                $lista = $consulta_reparo->fetch(PDO::FETCH_ASSOC);
                
            ?>

            <img src="./background-technologia-celular.jpg" alt="">
            <div  class="table">
            <form action="./alterar_reparo_processar.php" method="post"  >
                <h2>Alterar Reparo</h2>
                <label for="data_recebimento" class="inputCadastroCliente">
                    <p>Data Recebimento: <input type="date" class="inputCadastroCliente" name="data_recebimento" id="data_recebimento" value="<?php echo $lista['data_recebimento'] ;?>"></p> 
                </label>
                <label for="data_previsao" class="inputCadastroCliente">
                    <p>Previsão: <input type="date" class="inputCadastroCliente" name="data_previsao" id="data_previsao" value="<?php echo $lista['data_previsao'] ;?>"></p> 
                </label>
                <label for="data_entrega" class="inputCadastroCliente">
                    <p>Data de Entrega: <input type="date" class="inputCadastroCliente" name="data_entrega" id="data_entrega" value="<?php echo $lista['data_entrega'] ;?>"></p> 
                </label>
                <label for="mao_obra" class="inputCadastroCliente">
                    <p>Mão de Obra: <input type="number" class="inputCadastroCliente" name="mao_obra" id="mao_obra" value="<?php echo $lista['mao_obra'] ;?>"></p> 
                </label>
                <label for="custo_peca" class="inputCadastroCliente">
                    <p>Custo da Peça: <input type="number" class="inputCadastroCliente" name="custo_peca" id="custo_peca" value="<?php echo $lista['custo_peca'] ;?>" onblur="soma()"></p> 
                </label>
                <label for="valor_total" class="inputCadastroCliente">
                    <p>Valor Total: <input type="number" class="inputCadastroCliente" name="valor_total" id="valor_total"  value="<?php echo $lista['valor_total'] ;?>"></p> 
                </label>
                <label for="id_reparo">
                    <p><input type="hidden" name="id_reparo" value="<?php echo $lista['id_reparo'] ;?>"></p>
                </label>
                <label for="id_status" class="inputCadastroCliente">Status</label>
                    <select name="id_status" id="id_status">
                        
                        <?php 
                            $consulta_status = $conexao->query("SELECT * FROM `status`");
                            while($lista1 = $consulta_status->fetch(PDO::FETCH_ASSOC)){
                        ?>        
                                <option value="<?php echo $lista1['id_status']; ?>"> <?php echo $lista1['nome_status']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                <label for="id_tecnico" class="inputCadastroCliente">Técnico</label>
                    <select name="id_tecnico" id="id_tecnico">
                    
                        <?php 
                            $consulta_tecnico = $conexao->query("SELECT * FROM `tecnico`");
                            while( $lista2 = $consulta_tecnico->fetch(PDO::FETCH_ASSOC)){
                        ?>        
                                <option value="<?php echo $lista2['id_tecnico']; ?>"> <?php echo $lista2['nome_tecnico']; ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                <label for="id_eletronico" class="inputCadastroCliente">Modelo</label>
                    <select name="id_eletronico" id="id_eletronico">
                        
                        <?php 
                            $consulta_eletronico = $conexao->query("SELECT * FROM `eletronico`");
                            while($lista3 = $consulta_eletronico->fetch(PDO::FETCH_ASSOC)){
                        ?>        
                                <option value="<?php echo $lista3['id_eletronico']; ?>"> <?php echo $lista3['modelo']; ?></option>
                        <?php
                            }
                        ?>
                    </select>                    
                <label for="observacao" class="inputCadastroCliente">
                    <p>Observação: <textarea class="inputCadastroCliente" name="observacao" id="observacao" rows="3" cols="80" value="<?php echo $lista3['observacao']; ?>"></textarea></p> 
                </label>
                <button type="submit" name="botao_enviar" class="inputCadastroCliente btn">Enviar</button>
            </form>
        </div>
        </section>
    </main>
    <footer>
        <h6>Registrado</h6>
    </footer>   
    <script>

        function getValor(valor_campo){

        let valor = document.getElementById(valor_campo).value.replace(',','.');
        return parseFloat(valor);
        }

        function soma(){

        let total = getValor('mao_obra') + getValor('custo_peca');
        id('valor_total').value = total.toFixed(2)
        }

        function id(valor_campo){

        return document.getElementById(valor_campo);

        }

    </script>
</body>
</html>