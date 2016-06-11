<? 
function rpHash($value) { 
    $hash = 5381; 
    $value = strtoupper($value); 
    for($i = 0; $i < strlen($value); $i++) { 
        $hash = (($hash << 5) + $hash) + ord(substr($value, $i)); 
    } 
    return $hash; 
} 
$oResObj->post = $_POST;
if (rpHash($_POST['realperson']) == $_POST['realpersonHash']) { 
    $oResObj->success = true;
}else{
    $oResObj->success = false;
}
$oResObj->nocodif = rpHash($_POST['realperson']);
$oResObj->codificado = $_POST['realpersonHash'];
?>