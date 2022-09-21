<?php

require_once('app/Controllers/ControllerEleitor.php');


$eleitorDao = new ControllerEleitor();

$bill = 0;

$mark = 0;


?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Votos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/relatorio.css" rel="stylesheet">
</head>

<body>

    <?php if ($eleitorDao->readEleitor()) { ?>
        <?php foreach ($eleitorDao->readEleitor() as $eleitores) {

            if ($eleitores["id_candidato"] == 123) {
                $bill = $bill + 1;
            } else {
                $mark = $mark + 1;
            }
        }  ?>

    <?php } ?>


    <h1>Relatório</h1>

    <div id="divisao">
        <h2>Candidatos</h2>
        <div class="bloco">
            <img class="imagens" id="bill" src="imagens/bill3.jpg"><br>
            <label style="margin-left: -22px;">Bill Gates<br>
                <?php
                echo "Total de votos: " . $bill;
                ?>
            </label>
        </div>
        <div class="bloco">
            <img class="imagens" id="mark" src="imagens/mark4.jpg"><br>
            <label style="margin-left: 30px;">Mark Zuckerberg<br>
                <?php
                echo "Total de votos: " . $mark;
                ?>
            </label>
        </div>

    </div>


    <?php if ($eleitorDao->readEleitor()) { ?>
        <div class="container">
            <h1>Votantes</h1>
            <table class="table table-striped">

                <thead class="table-dark">
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Idade</th>
                    <th>Opção do Voto</th>
                    <th>Data do Registro</th>
                </thead>
                <tbody>
                    <?php foreach ($eleitorDao->readEleitor() as $eleitores) { ?>
                        <tr>
                            <td><?php echo $eleitores["nome_eleitor"] ?></td>
                            <td><?php echo $eleitores["cpf"] ?></td>
                            <td><?php echo $eleitores["idade"] ?></td>
                            <td><?php echo $eleitores["id_candidato"] ?></td>
                            <td><?php echo date('d/m/y', strtotime($eleitores["data_registro"])); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>