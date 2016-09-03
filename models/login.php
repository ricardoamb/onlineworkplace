<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OWP | Online WorkPlace</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="login.php">
                    <h1>Entrar no Sistema</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Nome de Usuário ou E-mail" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Senha" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="#">Entrar</a>
                        <a class="reset_pass" href="#">Esqueceu sua senha?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Novo no sistema?
                            <a href="#signup" class="to_register"><strong>Crie sua conta aqui!</strong></a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><img src="assets/images/logo_login.png" alt=""></h1>
                            <p>© 2016 Todos os direitos reservados.<br>OWP Online WorkPlaces | MR Sistemas<br>Termos de Privacidade</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Criar Conta</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Nome de Usuário" required="" />
                    </div>
                    <div>
                        <input type="email" class="form-control" placeholder="E-mail" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Senha" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Confirmação de Senha" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Criar Conta</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Já possui conta?
                            <a href="#signin" class="to_register"><strong>Faça o login aqui!</strong></a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><img src="assets/images/logo_login.png" alt=""></h1>
                            <p>© 2016 Todos os direitos reservados.<br>OWP Online WorkPlaces | MR Sistemas<br>Termos de Privacidade</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>