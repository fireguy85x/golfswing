<? 
if (http_session('captcha') == http_post('captcha')) { 
    $oResObj->success = true;
}else{
    $oResObj->success = false;
}
?>