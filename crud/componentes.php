<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
("INSERT INTO `tecnico` (`nome_tecnico`, `telefone_tecnico`, `endereco_id_endereco`) 
VALUES ('Rocket Raccoon', '61 9 9191 2020', '1');");

INSERT INTO `status` (`id_status`, `nome_status`) VALUES (NULL, 'Fechado');

INSERT INTO `reparo` (`id_reparo`, `data_recebimento`, `data_previsao`, `data_entrega`, `observacao`,
`mao_obra`, `custo_peca`, `valor_total`, `status_id_status`, `tecnico_id_tecnico`, `eletronico_id_eletronico`) 
VALUES (NULL, '2021-11-28', '2021-11-30', '2021-11-30', 'Trocar tela', '90.00', '300.00', '390.00', '1', '1', '1');


</body>
</html>