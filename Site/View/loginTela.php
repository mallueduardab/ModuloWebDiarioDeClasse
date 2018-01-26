<?php
require_once('../Controller/verificaLogado.php');
if (!isset($email)):
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

        <head>
            <title>Entrar</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/cadastro.css">
            <link href="https://fonts.googleapis.com/css?family=Fresca|Gloria+Hallelujah|Indie+Flower|Kurale" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />

            <link rel="stylesheet" href="css/fonts.css">

        </head>

        <body>
            <!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
            -->
            <div class="container">


                <div class="card card-container">
                        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                    <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    <p id="profile-name" class="profile-name-card"> ACESSAR MEUS DIÁRIOS</p>
                    <form class="form-signin" action="../Controller/professorInterface.php" method="post">
                        <input type="hidden" value="logar" name="acao">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
                        <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Password" required>
                        <div id="remember" class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me" name="lembrar" value="s"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">ENTRAR</button>
                    </form><!-- /form -->
                    <a href="#" class="forgot-password">
                        Esqueceu sua senha
                    </a>
                </div><!-- /card-container -->
                
                 <a href="cadastroTela.php">
                <button class="btn-cdst-rtrn btn btn-blockk">
                    <span class="glyphicon glyphicon-chevron-left"> </span> NÃO POSSUO CADASTRO
                </button>
            </a>
                
            </div><!-- /container -->
        </body>




    </html>
    <?php
else:
    ?>
    <script>
        window.location.replace("index.php");
    </script>
<?php
endif;
?>
