
	<html>
	<head>
	</head>

	<body>

	<?php

$pass=$_GET['password'];
$name=$_GET['username'];
$pass2=$_GET['password2'];
$errFlag=0;
$clientData['$name'] = NULL;

if(!($pass === $pass2)){
header('HTTP/1.1 302 Redirect');
header('Location: http://localhost/myProject/index.php?alert=pass');
$errFlag=1;
}
else{
$dataList=json_decode(file_get_contents('loginData.json'));
for($i=0;$i<count($dataList);$i++){
if($dataList[$i]->username===$name)
{$errFlag=1;
header('HTTP/1.1 302 Redirect');
header('Location: http://localhost/myProject/index.php?alert=name');
break;}
}

if(!$errFlag){

      $userData['$name']['salt']=bin2hex(random_bytes ( 8 ));
      $userData['$name']['pass']=hash('sha256',$pass.$userData['$name']['salt']);


      if (isset($_GET['remember'])){
      $clientData['$name']=bin2hex(random_bytes(8));
      }


$dataList[] = array('username'=>$name,'password'=>$userData['$name']['pass'],'salt'=>$userData['$name']['salt'],'clients'=> $clientData['$name'] );
file_put_contents('loginData.json', json_encode($dataList));


setcookie("Cookie", $clientData['$name'], time()+60*60*24*30);


$h='Location: http://localhost/myProject/userPage.php?name='.$name ;
header('HTTP/1.1 302 Redirect');
header($h);
}
}
	?>

	</body>
	</html>