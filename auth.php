<?php

$name=$_GET['username'];
$pass=$_GET["password"];

$dataList=json_decode(file_get_contents('loginData.json'));
for($i=0;$i<count($dataList);$i++){
if($dataList[$i]->username===$name){
if($dataList[$i]->password===hash('sha256',$pass.$dataList[$i]->salt)){
if(isset($_GET["remember"])){
$cookie=bin2hex(random_bytes(8));
$newClients=$dataList[$i]->clients.';'.$cookie;
$dataList[$i]->clients=$newClients;
file_put_contents('loginData.json', json_encode($dataList));
setcookie("Cookie", $cookie, time()+60*60*24*30);
}
$h='Location: http://localhost/myProject/userPage.php?name='.$name;
header('HTTP/1.1 302 Redirect');
header($h);
break;
}
header('HTTP/1.1 302 Redirect');
header('Location: http://localhost/myProject/login.php?nonLogin=1'); //Sorry mr.Fool,the password is incorrect
break;
}
header('HTTP/1.1 302 Redirect');
header('Location: http://localhost/myProject/login.php?nonLogin=2'); //We cannot find your nickname.If you haven't created account,do it first!!!
break;
}







?>