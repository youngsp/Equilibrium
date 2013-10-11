<?php

define('BD_USER', 'alianca');
define('BD_PASS', 'ecopolo');
define('BD_NAME', 'alianca');
$conn=mysqli_connect('localhost', BD_USER, BD_PASS);
mysqli_select_db($conn,BD_NAME);
mysqli_query($conn,"SET NAMES 'utf8'") OR die(mysql_error());

$cnome = trim(strip_tags(strtoupper($_POST["nome"])));
$csobrenome = trim(strip_tags(strtolower($_POST["sobrenome"])));
$cemail = trim(strip_tags($_POST['email']));
$csenha = trim(strip_tags($_POST['senha']));
$encrypted_pass = md5($csenha);





if(mysql_query("INSERT INTO associados SET key='".substr((time()*rand(), 20, 7))."', email='".$cemail."', senha='".$csenha."', nome='".$cnome."', sobrenome='".$csobrenome."'",$conn);{
echo "<a href='index.html'>Voltar</a>";
};

?>
