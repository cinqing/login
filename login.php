<?php
header("Content-Type:text/html; charset=utf8");
if(!isset($_POST["submit"])){
	exit("错误执行");
}
include('connect.php');//链接数据库 
$name=$_POST['name'];
$password=$_POST['password'];
if($name&&$password){
	$sql="select * from register where username='$name' and password='$password'";
	$result=mysql_query($sql);
	$rows=mysql_num_rows($result);
	if($rows){
		header("refresh:0;url=welcome.html");
		exit;
	}else{
		echo "用户名或密码错误";
		echo "
		<script>
		  setTimeout(function(){window.location.href='login.html';},1000);
		</script>
		";
	}
}else{
		echo"表单填写不完整";
		echo "
		<script>
			setTimeout(function(){window.location.href='login.html';},1000);
		</script>";
	}
	mysql_close();

?>