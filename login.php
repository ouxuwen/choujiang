<?php
@$tel = $_REQUEST['tel'] or die('TYPEID REQUIRED');
@$password = $_REQUEST['password'] or die('TYPEID REQUIRED');

$conn = mysqli_connect('120.79.209.150', 'root', '123456', 'wufan', 8960);

$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);

$sql = "SELECT * FROM user WHERE tel='$tel' and password='$password' ";
$result = mysqli_query($conn,$sql);

//DQL: false或结果集描述对象
if($result===false){
	echo "SELECT ERR: $sql";
}else {
	//SQL执行成功，读取所有记录行
	$list = mysqli_fetch_all($result, MYSQLI_ASSOC);	
	if($list){
		echo json_encode($list[0]);
	}else{
		echo json_encode('error');
	}
	
}