$('#reload-captcha').click(function(){
    $('#img-captcha img').remove();
    $('#img-captcha').append('<img src="/scripts/captcha/image_captcha.php" />');
    $('#captcha').val('');
});
