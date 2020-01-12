<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
<link rel='stylesheet' href="style.css" />
<?php
$dataList=json_decode(file_get_contents('loginData.json'));
for($i=0;$i<count($dataList);$i++){
$Clients=explode(";",$dataList[$i]->clients);
for($c=0;$c<count($Clients);$c++){
if($_COOKIE['Cookie']===$Clients[$c]){
$h='Location: http://localhost/myProject/userPage.php?name='.$dataList[$i]->username;
header('HTTP/1.1 302 Redirect');
header($h);
break;
}
}
}
if(isset($_GET['nonLogin'])){
if($_GET['nonLogin']==='1'){
echo 'Sorry mr.Fool,the password is incorrect';
unset($_GET['nonLogin']);
}
else if($_GET['nonLogin']==='2'){
echo "We cannot find your nickname.If you haven't created account,do it first!!!";
unset($_GET['nonLogin']);
}
}
?>

<br><br><br><br><br><br><br><br><br>
<form method="get" action="auth.php" >
				<label>Your Gamer Nickname </label>
				<br>
				<input type="text" name="username" placeholder="nickname">
				<br>
				<label>Gamer password</label>
				<br>
				<input type="text" name="password" placeholder="Password">
				<br>
				<input type="checkbox" name="remember">
				<label >Remember Gamer device</label><br>
		    	<input type="submit" value="Send">
		</form>

What??You do not have an account yet??<a href="http://localhost/myProject/index.php?alert=NULL">Create one now!!!</a>
	</body>
	</html>
