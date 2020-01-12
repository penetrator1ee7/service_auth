<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<link rel='stylesheet' href="style.css" />
<br><br><br><br><br><br>
привет,геймер
<?php
$dataList=json_decode(file_get_contents('loginData.json'));
for($i=0;$i<count($dataList);$i++){
$Clients=explode(";",$dataList[$i]->clients);
for($c=0;$c<count($Clients);$c++){
if($_COOKIE['Cookie']===$Clients[$c]){
$name=$dataList[$i]->username;
}
}
}
if(isset($_GET['name'])){
echo $_GET['name'];
}
else echo $name;
?>
<br>
<a href="logout.php">I want to logout.</a>
</body>
</html>