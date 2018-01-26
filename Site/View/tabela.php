<?php
require_once('../Controller/verificaLogado.php');
//if (isset($email) && isset($_GET['idDiario']) && isset($_GET['idAluno']) && isset($_GET['nomeAluno'])):
    ?>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link href="https://fonts.googleapis.com/css?family=Fresca|Gloria+Hallelujah|Indie+Flower|Kurale" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/sobreAluno.css">
        <link rel="stylesheet" href="css/principal.css">
        <link rel="stylesheet" href="css/fonts.css">
    </head>
    <body>
        
        <!-- 
        
        
        
        Ainda vou arrumar o template, mas os dados necessários são esses
        
        
        
        -->
        
            <header class="header-red">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 text-white mtop40">
                            <h4>Boletim de</h4>
                            <h1 class="pleft0"><?php echo $_GET["nomeAluno"]; ?></h1>
                            <h3>Escola: </h3><h3></h3>
                            <h3>Professor:</h3>
                            <h3></h3>
                            <h3>Série:</h3>
                            <h3></h3>
                            <h3>Turma:</h3>
                            <h3></h3>
                            <h3>Periodo:</h3>
                            <h3></h3>
                        </div>

                        <a class="top-icon-back m30" href="sobreAluno.php">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
 
                        
                        
                    </div>
                </div>
            </header>
        <div class="container">
            
                      
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Avaliação</th>
                        <th>Valor</th>
                        <th>Nota obtida</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- dados por avaliação, segundo o período de referencia!-->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <!-- linha de espaçamento -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                
                <tr>
                    <th>Nota final</th>
                    <th></th>
                    <th><!-- nota final --></th>
                </tr>
                
                <tr>
                    <th>Total de faltas no período</th>
                    <th></th>
                    <th><!-- total de faltas--></th>
                </tr>
               
                    
            </table>
        </div>

    </body>
</html>
