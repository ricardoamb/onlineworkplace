<?php
    if(is_logged(false)){
?>
        <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo base_url();?>" class="site_title text-center"><img id="menu-logo"
                                                                                 src="<?php echo base_url();?>assets/images/otw-navbar-logo.png"
                                                                                 alt="Online WorkPlace"
                                                                                 style="margin-left:-20px;"></a>
                        <a href="<?php echo base_url();?>" class="site_title-lt text-center hide"><img id="menu-logo-lt"
                                                                                               src="<?php echo base_url();?>assets/images/otw-navbar-logo-lt.png"
                                                                                               alt="Online WorkPlace"
                                                                                               style="margin-left:-20px;"></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="../assets/images/profile-pics/<?php echo $this->session->userdata('id');?>.jpg" alt="assets." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <h2><?php echo $this->session->userdata('fullname'); ?></h2>
                            <h2>
                                <small><?php echo $this->session->userdata('level_name'); ?></small>
                            </h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br/>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-pencil-square-o"></i> Ocorrências <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">Nova Ocorrência</a></li>
                                        <li><a href="#">Inserir Observação</a></li>
                                        <li><a href="#">Finalizar Ocorrência</a></li>
                                        <li><a href="#">Editar Ocorrências</a></li>
                                        <li><a href="#">Consultar</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-users"></i> Moradores <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">Novo Morador</a></li>
                                        <li><a href="#">Editar Morador</a></li>
                                        <li><a href="#">Desativar Morador</a></li>
                                        <li><a href="#">Notificações</a></li>
                                        <li><a href="#">Síndco/Administração</a></li>
                                        <li><a href="#">Visitantes</a></li>
                                        <li><a href="#">Prestadores de Serviço</a></li>
                                        <li><a href="#">Opções</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Tecla Cheia" id="fullscreen-btn" data-status="default" style="cursor:pointer;">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Bloquear">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Sair" href="<?php echo base_url();?>auth/logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav left" style="float: left;">
                            <li><button type="button" class="btn btn-default navbar-btn quick-btn hidden-sm hidden-xs" style="margin-top:12px;" data-toggle="tooltip" data-placement="bottom" title="Nova Ocorrência"><i class="fa fa-pencil-square-o fa-lg"></i></button></li>
                            <li><button type="button" class="btn btn-default navbar-btn quick-btn hidden-sm hidden-xs" style="margin-top:12px;" data-toggle="tooltip" data-placement="bottom" title="Nova Visita"><i class="fa fa-user-plus fa-lg"></i></button></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/images/profile-pics/<?php echo $this->session->userdata('id');?>.jpg" alt="">
                                    <span class="hidden-sm hidden-xs"><?php echo $this->session->userdata('fullname'); ?></span>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="dashboard/profile/<?php echo $this->session->userdata('username') ?>">Perfil</a></li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-blue pull-right">50%</span><span>Configurações</span>
                                        </a>
                                    </li>
                                    <li><a href="javascript:;">Ajuda</a></li>
                                    <li><a href="<?php echo base_url();?>auth/logout"><i class="fa fa-sign-out pull-right"></i>Sair</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-red">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                    <li>
                                        <a>
                                            <span class="image"><img src="../assets/images/img.jpg" alt="Profile Image"/></span>
                                            <span>
                                              <span>John Smith</span>
                                              <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">Film festivals used to be do-or-die moments for movie makers. They were whereassets.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="../assets/images/img.jpg" alt="Profile Image"/></span>
                                            <span>
                                              <span>John Smith</span>
                                              <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">Film festivals used to be do-or-die moments for movie makers. They were whereassets.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="../assets/images/img.jpg" alt="Profile Image"/></span>
                                            <span>
                                              <span>John Smith</span>
                                              <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">Film festivals used to be do-or-die moments for movie makers. They were whereassets.</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image"><img src="../assets/images/img.jpg" alt="Profile Image"/></span>
                                            <span>
                                              <span>John Smith</span>
                                              <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">Film festivals used to be do-or-die moments for movie makers. They were whereassets.</span>
                                        </a>
                                    </li>


                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col content-main" role="main">
                <div class="">
                    <div class="page-title">

                        <div class="title_left">
                            <h3>Painel de Controle</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pesquisar">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Plain Page</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    Add content to the page assets.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Plain Page</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    Add content to the page assets.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    OWP - Online WorkPlace by <a href="https://mrsistemas.com">MR Sistemas</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
<?php
    }
?>