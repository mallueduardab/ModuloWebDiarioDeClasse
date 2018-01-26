<?php
require_once('../Controller/verificaLogado.php');
if (isset($email)):
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

        <head>
            <title>Cadastrar Diário</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/controleAulas.css">
            <link rel="stylesheet" href="css/fonts.css">
            <link rel="shortcut icon" href="../View/img/favicon.ico" type="image/x-icon" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="js/specimen_files/specimen_stylesheet.css" type="text/css" charset="utf-8" />
            <script src="js/cdst.js"></script>
        </head>

        <body>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="nav-title-top">
                            <h4 class="cdst-left">
                                <a class="backpage_glypicon" href="assistenteInicialPT3.php">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    Assistente de Criação de Diário
                                </a>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid body_white">
                <div class="row">
                    <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
                        <div class="row">
                           
                                <p class="description-about-theme text-justify " >
                                    Cada diário pertence a uma escola e turma específica,<br/> por essa razão, precisamos
                                    que você informe o nome <br/> completo da Escola e os dados da turma que você <br/>gostaria
                                    de controlar nesse novo diário. <br/>
                                </p>

                                <p class="description-about-theme text-justify">
                                    Ex: Escola Municipal Jardim Encantado<br>
                                    Série: 3<br>
                                    Modalidade de ensino: Ensino Fundamental<br>
                                    Identificação de turma: A<br>
                                    Turno: Tarde<br>
                                </p>
                            
                            
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1"> </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <form name="registerDiaries" id="dForms" action="cadastrarDiario2.php" method="POST">
                            <h3 class="cdst">Nome completo da escola</h3>
                            <span class="glyphicon big_glyphicon glyphicon-education "></span>
                            <input type="text" id="nameSchool" name="escola" class="form-control-cdst btn-outline" placeholder="Nome da escola" required>

                            <h3 class="cdst">Nome da disciplina</h3>
                            <span class="glyphicon big_glyphicon glyphicon-blackboard "></span>
                            <input type="text" id="nameDiscipline" name="disciplina" class="form-control-cdst btn-outline" placeholder="Nome da disciplina" required>

                            <h3 class="cdst">Modalidade</h3>
                            <span class="glyphicon big_glyphicon glyphicon-calendar"></span>
                            <select id="modality" class="form-control-cdst btn-outline" name="modalidade" >
                                <option value="p">Ensino Primário </option>
                                <option value="f">Ensino Fundamental </option>
                                <option value="m">Ensino Médio </option>
                            </select>

                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <h3 class="cdst">Série</h3>
                                    <span class="glyphicon big_glyphicon glyphicon-tag"></span>
                                    <select id="series" class="form-control-cdst btn-outline" name="serie" >
                                        <option value="0">1ª</option>
                                        <option value="1">2ª</option>
                                        <option value="2">3ª</option>
                                        <option value="3">4ª</option>
                                        <option value="4">5ª</option>
                                        <option value="5">6ª</option>
                                        <option value="6">7ª</option>
                                        <option value="7">8ª</option>
                                        <option value="8">1º</option>
                                        <option value="9">2º</option>
                                        <option value="10">3º</option>
                                    </select>
                                </div>

                                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                    <h3 class="cdst">Identificação da turma</h3>
                                    <span class="glyphicon big_glyphicon glyphicon-bullhorn"></span>
                                    <input type="text" id="idClass" name="turma" class="form-control-cdst btn-outline" placeholder="Identificação Turma" required>
                                </div>
                            </div>

                            <h3 class="cdst">Regime de aulas</h3>
                            <span class="glyphicon big_glyphicon glyphicon-education "></span>
                            <select id="classRegimen" name="regime" class="form-control-cdst btn-outline" >
                                <option value="b">Bimestral</option>
                                <option value="t">Trimestral</option>
                                <option value="s">Semestral</option>
                            </select>

                            <br/>
                            <button class="btn btn-info"  role="button" type="submit">
                                CONTINUAR <span class="glyphicon glyphicon-chevron-right"></span>
                            </button>

                        </form>
                    </div>

                </div>
            </div>


            <!-- jQuery -->
            <script src="vendor/jquery/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

            <!-- Plugin JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

            <!-- Contact Form JavaScript -->
            <script src="js/jqBootstrapValidation.js"></script>
            <script src="js/contact_me.js"></script>

            <!-- Theme JavaScript -->
            <script src="js/freelancer.min.js"></script>

        </body>


    </html>
<?php else: ?>
    <script>
        window.location.replace("loginTela.php");
    </script>
<?php endif; ?>
