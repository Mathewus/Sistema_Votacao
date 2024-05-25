<?php

require_once('app/Models/Eleitor.php');
require_once('app/Controllers/ControllerEleitor.php');



$eleitorDao = new ControllerEleitor();


if (!empty($_POST['nome_eleitor']) && !empty($_POST['cpf']) && !empty($_POST['idade']) && !empty($_POST['id_candidato'])) {

    $eleitor = new Eleitor($_POST['nome_eleitor'], $_POST['cpf'], $_POST['idade'], $_POST['id_candidato']);


    $eleitor->validarDados();
    //var_dump($eleitor);


    if (empty($eleitor->erro)) {
        $eleitorDao->createEleitor($eleitor);
    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Votação</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">
</head>


<body>
    <div id="containercentral" class="container border border-2 rounded-4 p-4 shadow bg-white mb-5">

        <form method="POST">

            <h2 align="center"><b>VOTAÇÃO</b></h2>
            <div class="row">
                <div class="inputstexts">
                    <label for="nome_eleitor">Nome do eleitor</label>
                    <input type="text" name="nome_eleitor" class="form-control form-control-lg bg-light" value="" required>

                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control form-control-lg bg-light" value="" required>

                    <?php if (isset($eleitor) && !empty($eleitor->erro["erro_cpf"])) { ?>
                        <div style="max-height: 10px; font-size: 13; color: red; margin-left: 30px">
                            <div>
                                <?php echo $eleitor->erro["erro_cpf"]; ?>
                            </div>
                        </div>
                    <?php } ?>

                    <label for="idade">Idade</label>
                    <input type="text" name="idade" class="form-control form-control-lg bg-light" value="" required>

                    <?php if (isset($eleitor) && !empty($eleitor->erro["erro_idade"])) { ?>
                        <div style="max-height: 10px; font-size: 13; color: red; margin-left: 30px">
                            <?php if (!empty($eleitor->erro["erro_idade"])) { ?>
                                <div>
                                    <?php echo $eleitor->erro["erro_idade"]; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>



                </div>


                <div class="inputsradios">
                    <img class="imagens" src="imagens/bill3.jpg">
                    <input type="radio" name="id_candidato" id="bill" value="123">
                    <label for="bill" class="form-label fw-bold">Bill Gates</label>
                </diV>
                <div class="inputsradios">
                    <img class="imagens" src="imagens/mark4.jpg">
                    <input type="radio" name="id_candidato" id="mark" value="456">
                    <label for="mark" class="form-label fw-bold">Mark Zuckerberg</label>
                </div>


                <div class="d-grid mb-4">
                    <input id="button" type="submit" value="VOTAR" class="btn btn-primary btn-lg">
                </div>

                 <div class="d-grid mb-4">
                <a href="relatorio.php" target="_blanck">
                    <button class="botao btn btn-success" type="button">Relatório de Votos</button>
                </a>
                </div>
                
            </div>

        </form>

    </div>



    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>