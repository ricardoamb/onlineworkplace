$(document).ready(function(){
    $('#login-form').submit(function(){
        var err = false;
        if($('#login-username').val() == '')
        {
            $('#login-username').addClass('empty-input').addClass('form-control-error');
            $('.empty-input-username').removeClass('hide');
            err = true;
        }
        if($('#login-password').val() == '')
        {
            $('#login-password').addClass('empty-input').addClass('form-control-error');
            $('.empty-input-password').removeClass('hide');
            err = true;
        }
        if(err)
        {
            return false;
            //alert('contem erros');
        }else{
            //alert('ok');
        }

    });
    $('.login-input').change(function(){
        if($(this).val() != '')
        {
            $(this).removeClass('empty-input').removeClass('form-control-error');
            $(this).next().addClass('hide');
        }else{
            $(this).addClass('empty-input').addClass('form-control-error');
            $(this).next().removeClass('hide');
        }
    });
    $('#fullscreen-btn').click(function(){
        if($.fullscreen.isFullScreen())
        {
            $.fullscreen.exit();
        }else{
            $('body').fullscreen();
        }
    });
    $('#menu_toggle').click(function(){
        if($('body').hasClass('nav-md'))
        {
            $('a.site_title-lt').addClass('hide');
            $('a.site_title').removeClass('hide');
        }else{
            $('a.site_title').addClass('hide');
            $('a.site_title-lt').removeClass('hide');
        }
    });
    if($('#message').data('message') == 'show'){
        var type = $('#message').data('type');
        var title = $('#message').data('message-title');
        var message = $('#message').html();
        var position = "toast-"+$('#message').data('pos');
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": position,
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type]("<strong style='font-size:18px;'>"+title+"</strong><br><span style='font-size:14px;'>"+message+"</span>");
    };

    $('#recovery-btn').click(function(){
        var emailValue = $('#recovery-email').val();
        var validEmail = new RegExp(/^[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/gi);
        if(emailValue != "")
        {
            if(emailValue.match(validEmail)){
                $('#recovery-btn').html('<i class="fa fa-spinner fa-pulse fa-lg"></i> <small>Aguarde...</small>');
                // Rotina Ajax
                $.ajax({
                    type: 'post',
                    data: 'email='+emailValue,
                    url:'recovery_password',
                    success: function(retorno){
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": 'toast-top-full-width',
                            "preventDuplicates": true,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        switch (retorno)
                        {
                            case 'senha_recriada':
                                toastr['success']("<strong style='font-size:18px;'>Nova senha enviada!</strong><br><span style='font-size:14px;'>Foi enviada uma nova senha para o e-mail: "+emailValue+"</span>");
                                $('.modal-forgot').modal('hide');
                                break;
                            default:
                                toastr['error']("<strong style='font-size:18px;'>Erro inesperado!</strong><br><span style='font-size:14px;'>Ocorreu um erro inesperado, tente novamente!</span>");
                                $('#recovery-btn').html('<i class="fa fa-check"></i> Enviar');
                                $('#recovery-email').val('').focus();
                                break;
                        }
                    }
                })
            }else{
                $('#recovery-email').addClass('empty-input');
                $('.error-message-recovery').html('<small>O endereço de <strong>"E-mail"</strong> informado é inválido.</small>').removeClass('hide');
            }
        }else{
            $('#recovery-email').addClass('empty-input');
            $('.error-message-recovery').html('<small>Digite um endereço de <strong>"E-mail"</strong> válido.</small>').removeClass('hide');
        }
    });
    $('#recovery-email').on('input',function(e){
        if($(this).hasClass('empty-input'))
        {
            $('#recovery-email').removeClass('empty-input');
            $('.error-message-recovery').addClass('hide');
        }
    });
    $('.modal-forgot').on('hidden.bs.modal', function (e) {
        $('#recovery-email').val("");
        $('#recovery-btn').html('<i class="fa fa-check"></i> Enviar');
        $('#recovery-email').removeClass('empty-input');
        $('.error-message-recovery').addClass('hide');
    });
    $('#recovery-passwd-form').submit(function(){
        return false;
    });
});
