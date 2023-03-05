<?php include_once "./base.php";

$user=$User->find(['email'=>$_GET['email']]);

if(isset($user)){
    echo "您的密碼為".$user['pw'];
}else{
echo "查無此資料";

}




