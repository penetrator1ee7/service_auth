<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
<?php
$dataList=json_decode(file_get_contents('loginData.json'));
for($i=0;$i<count($dataList);$i++){
$Clients=explode(";",$dataList[$i]->clients);
for($c=0;$c<count($Clients);$c++){
if($_COOKIE['Cookie']===$Clients[$c]){
unset($Clients[$c]);
sort($Clients);
$newClients=implode(";",$Clients);
$dataList[$i]->clients=$newClients;
file_put_contents('loginData.json', json_encode($dataList));
header('HTTP/1.1 302 Redirect');
header('Location: http://localhost/myProject/login.php');
}
}
}
?>
	</body>
	</html>
