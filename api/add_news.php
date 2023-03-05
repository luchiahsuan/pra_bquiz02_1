<?php include_once "./base.php";

$_POST['sh']=1;

$News->save($_POST);

to("../back.php?do=news");