<?php 
    include "$_SERVER[DOCUMENT_ROOT]/sistema-bd-ufsj/controller/questao_controller.php";
    include "$_SERVER[DOCUMENT_ROOT]/sistema-bd-ufsj/controller/prova_controller.php";

    
    $provaController = new ProvaController();
    $questaoController = new QuestaoController();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        var_dump($_GET);
        $ret = $provaController->calculaResultadoProva($_GET['id_prova']);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

<div id="content-wrapper">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Resultados da prova</div>
      <div class="card-body">
        <div class="card-text" style="padding-bottom:10px;">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center">Questão</th>
                    <th class="text-center">Resposta dada</th>
                    <th class="text-center">Gabarito</th>
                    <th class="text-center">Visualizar Questão</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    for ($i=0; $i < sizeof($ret['num_questao']); $i++) {
                        echo "<tr>";
                        echo "<td><center>".$ret['num_questao'][$i]."</center></td>";
                        echo "<td><center>".$ret['resposta_usuario'][$i]."</center></td>";
                        echo "<td><center>".$ret['gabarito'][$i]."</center></td>";
                        
                        echo "</tr>";
                    }
                ?>
                </tbody>
              </table>
            </div>
            
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Nota final</td>
                            <td><?php echo $ret['nota'];?></td>
                        </tr>
                    </tbody>
              </table>
            </div>

            <button class="btn btn-primary btn-block" href="view/aluno.php">Finalizar Prova</button>

        </div>
        
        
        </div>
    </div>

    
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
