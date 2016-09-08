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

});
