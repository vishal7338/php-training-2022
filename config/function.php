<?php
function addAlert($type,$msg){
    $_SESSION['alert']['type']=$type;
    $_SESSION['alert']['msg']=$msg;

}
function displayAlert(){
    if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])){
$type=$_SESSION['alert']['type'];
$msg=$_SESSION['alert']['msg'];
$html='';
$html.='<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">'.$msg.'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
unset($_SESSION['alert']);
return $html;
    }
}

?>