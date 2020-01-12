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
if(isset($_GET['alert'])){
if($_GET['alert']==='pass'){
echo "passwords shall be similar";
unset($_GET['alert']);
}
else if($_GET['alert']==='name'){
echo "user with this nickname already exists";
unset($_GET['alert']);
}
}
?>
<br><br><br><br><br><br><br><br><br>
		<form method="get" action="create.php">
				<label>Your Gamer Nickname </label>
				<br>
				<input type="text" name="username" placeholder="nickname">
				<br>
				<label>Your gamer password </label>
				<br>
				<input type="text" name="password" placeholder="Password">
				<br>
			    <label>Type your password again.</label>
			    <br>
			    <input type="text" name="password2" placeholder="Password">
			    <br>
				<input type="checkbox" name="remember">
				<label >Remember Gamer device</label>
		    	<input type="submit" value="Send">
		</form>
Already have an account??<a href="login.php?nonLogin=NULL">Log IN!!!</a>
	</body>
	</html>
