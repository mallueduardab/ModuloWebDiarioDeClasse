<?php
require_once('../Controller/verificaLogado.php');
if (!isset($email) && $_POST['email']):
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

        <head>
            <title>Boas vindas novo usuário!</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/controleAulas.css">
            <link rel="stylesheet" href="css/imagens.css">
            <link rel="stylesheet" href="css/fonts.css">
            <link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </head>

        <body>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                        <div class="image2"></div>
                    </div>
                    <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">

                        <div class="padd_top title_middle">
                            <h1>OLÁ, MUNDO!</h1>
                        </div>

                        <p class="description text-justify">
                            Antes de criar seu diário, precisamos deixar esse espaço <br/>
                            literalmente com a sua cara. Adicione uma foto e complete o seu <br/>
                            nome de usuário para que possamos nos conhecer melhor.<br/>
                        </p>

                        <form class="form-signin" action="../Controller/professorInterface.php" method="POST" enctype="multipart/form-data">
                            <!-- hiddens -->
                            <input type="hidden" name="acao" value="cadastrar">
                            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
                            <input type="hidden" name="senha" value="<?php echo $_POST['senha']; ?>">

                            <div class=" row ctn-dados">
                                <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                    <div id="ctn-foto" class="pull-center">        
                                        <input type="file" name="arquivo" id="arquivo"  >
                                        <!--<input type="submit" value="alterarImg"> -->
                                        <input type="hidden" value="<?php ?>">
                                    </div>
                                </div>

                                <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
                                    <h3 class="cdst">Seu nome</h3>
                                    <input type="text" id="inputName" class="form-control-cdst btn-outline" placeholder="Ana Maria"  name="nome" required>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> </div>
                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
                            <button class="btn btn-info  " role="button" type="submit">CONTINUAR
                                        <span class="glyphicon glyphicon-chevron-right pull-right"></span>
                            </button>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </body>
        

    </html>
    
    
<?php else: ?>
    <script>
        window.location.replace("cadastroTela.php");
    </script>
<?php endif; ?>
