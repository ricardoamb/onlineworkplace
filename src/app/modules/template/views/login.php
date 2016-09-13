<body class="login">

<!-- Modal de Esqueceu Senha -->
<div class="modal fade modal-forgot" tabindex="0" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle-o"></i> Esqueci minha senha</h4>
            </div>
            <form id="recovery-passwd-form">
                <div class="modal-body">
                    <h5>Sem problemas!</h5>
                    <p><small>Informe seu e-mail para lhe enviarmos uma nova senha.</small></p>
                    <div class="form-group">
                        <input type="email" class="form-control" name="recovery-email" id="recovery-email" placeholder="E-mail">
                        <span class="right error-message-recovery hide"></span>
                    </div>
                </div>
                <div class="modal-footer center" style="margin-top:10px;">
                    <center>
                        <button type="button" id="recovery-btn" class="btn btn-success"><i class="fa fa-check"></i> Enviar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fim Modal Esqueceu Senha -->

<div>
    <?php get_message('logoff'); ?>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <a class="hiddenanchor" id="forgot"></a>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="login" method="post" id="login-form">
                    <h1>Entrar no Sistema</h1>
                    <?php validation_er(); ?>
                    <?php echo $this->session->flashdata('error_message');?>
                    <div class="row">
                        <div class="col-xs-1"><i class="fa fa-user fa-lg" style="margin-top:10px;"></i></div>
                        <div class="col-xs-11">
                            <input type="text" name="username" class="form-control login-input" id="login-username" placeholder="Nome de Usuário ou E-mail" />
                            <span class="right empty-input-username hide"><small>O campo <strong>"Nome de Usuário ou E-mail"</strong> é obrigatório!</small></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1"><i class="fa fa-lock fa-lg" style="margin-top:10px;"></i></div>
                        <div class="col-xs-11">
                            <input type="password" name="password" class="form-control login-input" id="login-password" placeholder="Senha" />
                            <span class="right empty-input-password hide"><small>O campo <strong>"Senha"</strong> é obrigatório.</small></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark submit block" id="login-submit" style="margin-top:10px;">Entrar</button>

                    <a class="reset_pass" data-toggle="modal" data-target=".modal-forgot" style="font-size:.8em;cursor:pointer;">Esqueceu sua senha?</a>

                    <div class="clearfix"></div>

                    <div class="separator" style="margin-top:20px;">
                        <p class="change_link" style="margin-top:10px;">Novo no sistema?
                            <a href="#signup" class="to_register"><strong>Crie sua conta aqui!</strong></a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><img src="../assets/images/logo_login.png" alt=""></h1>
                            <p>© 2016 Todos os direitos reservados.<br>OWP Online WorkPlace | MR Sistemas<br>Termos de Privacidade</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Criar Conta</h1>
                    <div class="row">
                        <div class="col-xs-1"><i class="fa fa-user fa-lg" style="margin-top:10px;"></i></div>
                        <div class="col-xs-11">
                            <input type="text" class="form-control" placeholder="Nome de Usuário" required="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1"><i class="fa fa-envelope fa-lg" style="margin-top:10px;"></i></div>
                        <div class="col-xs-11">
                            <input type="email" class="form-control" placeholder="E-mail" required="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1"><i class="fa fa-lock fa-lg" style="margin-top:10px;"></i></div>
                        <div class="col-xs-11">
                            <input type="password" class="form-control" placeholder="Senha" required="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-1"><i class="fa fa-lock fa-lg" style="margin-top:10px;"></i></div>
                        <div class="col-xs-11">
                            <input type="password" class="form-control" placeholder="Confirmar senha" required="" />
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-dark submit block" style="margin-top:10px;" href="#">Criar Conta</a><br>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator" style="margin-top:25px;">
                        <p class="change_link" style="margin-top:10px;">Já possui conta?
                            <a href="#signin" class="to_register"><strong>Faça o login aqui!</strong></a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><img src="../assets/images/logo_login.png" alt=""></h1>
                            <p>© 2016 Todos os direitos reservados.<br>OWP Online WorkPlace | MR Sistemas<br>Termos de Privacidade</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>