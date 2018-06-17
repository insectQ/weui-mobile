<?php

//1//////////////////////////////////////////////////////////////////////////////////
$no = $_POST["no"];
$password = $_POST["password"];

$sql = "select * from t_user where no = '$no' and password = '$password'";
//////////////////////////////////////////////////////////////////////////////////////

//链接数据库服务器、链接数据库，执行sql语句
$conn = @mysql_connect('127.0.0.1','root','root');
@mysql_select_db('stu',$conn);
//设置编码
@mysql_query("set names 'utf8'");//读库 
$rs = @mysql_query($sql);               //PHP执行SQL语句（增删改查CRUD），增加、删除、修改返回的结果为1 、0（影响行数），查找返回的是一个结果集

//2////////////////////////////////////////////////////////////////////////////////////
$array = array();
if(@mysql_fetch_assoc($rs)){
	$array["success"] = true;
}else{
	$array["success"] = false;
}
echo(json_encode($array));
////////////////////////////////////////////////////////////////////////////////////////
?>