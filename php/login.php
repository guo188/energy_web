<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("content-type:text/html;charset=utf-8");

$dblink=mysql_connect("localhost","root","root") or die("数据库连接失败");

mysql_query("set names utf8");

mysql_select_db("energy_web");

$account=$_POST['account'];

$passsword=$_POST['password'];

$sql="select * from users where account='{$account}'";

$rs=mysql_query($sql); //执行sql查询

$num=mysql_num_rows($rs); //获取记录数

if($num){ // 用户存在；
	$row=mysql_fetch_array($rs);
	if($passsword===$row['password']){ //对密码进行判断。
		echo "登陆成功，正在为你跳转至后台页面";
		header("location:../html/main.html");
	}else{
		echo "<h3>密码不正确</h3>";
		echo "<a href='../index.html'>返回登陆页面</a>";
	}
}else{
	echo "<h3>用户不存在</h3>";
	echo "<a href='../index.html'>返回登陆页面</a>";
}

?>
