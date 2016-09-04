<?php
$theme['title'] = "Ops... Página não encontrada!";
$this->load->view('template/structure/header',$theme);
?>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <img src="../assets/images/logo_login.png" alt="OWP">
                    <h1 class="error-number">Ops... 404</h1>
                    <h2>Desculpe! Mas não conseguimos encontrar esta página</h2>
                    <p>Essa página que está procurando não existe!</p>
                    <div class="mid_center">
                        <h3>Pesquisar</h3>
                        <form>
                            <div class="col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pesuisar por...">
                      <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Vai!</button>
                          </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>

<?php $this->load->view('template/structure/footer'); ?>