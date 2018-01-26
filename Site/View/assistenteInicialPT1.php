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
            <link rel="stylesheet" href="css/fonts.css">
            <link rel="stylesheet" href="css/imagens.css">
            <link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        </head>

        <body>

                <div class="container-fluid">
                    <div class="row">
                        
                            <div class=" col-sm-2 col-md-2 col-lg-2 col-xl-2 ">
                                <div class="image"></div>    
                            </div>
                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 padd_top">
                                <h2 class="cdst-right">
                                    <span id="title2"> SEJA MUITO BEM VINDO(A),</span><br/>
                                    <span id="subtitle">PROFESSOR(A)!</span>
                                </h2>

                                <p class="description text-justify">
                                    Esse assistente vai te ajudar a dar seus primeiros passos <br/>
                                    cadastrando-se e criando seus diários. Você pode clicar no <br/>
                                    botão fechar acima a qualquer momento para sair do assistente.<br/>
                                </p> 
                                
                                <form action="assistenteInicialPT2.php" method="POST" class="pull-right">
                                        <!-- hiddens -->
                                        <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
                                        <input type="hidden" name="senha" value="<?php echo sha1($_POST['senha']); ?>">

                                        <input type="submit" value="VAMOS LÁ!" class="btn btn-info" role="button" >
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
