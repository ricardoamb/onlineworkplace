<?php
$theme['title'] = "Ops... Página não encontrada!";
$owp =& get_instance();
$owp->load->view('template/structure/header_404',$theme);
?>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <img src="<?php echo base_url('assets/images');?>/logo_login.png" alt="OWP">
                    <h1 class="error-number">Ops... 404</h1>
                    <h2>Desculpe! Mas não conseguimos encontrar esta página</h2>
                    <p>A página que está procurando não existe ou foi retirada do ar!</p>

                    <h2><a href="<?php echo base_url();?>">Clique aqui para voltar ao Dashboard</a></h2>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>

<?php $owp->load->view('template/structure/footer_404'); ?>