<?php
@$tel = $_REQUEST['tel'] or die('TYPEID REQUIRED');
@$gift = $_REQUEST['gift'] or die('TYPEID REQUIRED');

$conn = mysqli_connect('120.79.209.150', 'root', '123456', 'wufan', 8960);

$sql = "SET NAMES UTF8";
mysqli_query($conn,$sql);

$sql = "SELECT gifts FROM user WHERE tel='$tel'  ";
$result = mysqli_query($conn,$sql);

//DQL: false或结果集描述对象
if($result===false){
	echo "SELECT ERR: $sql";
}else {
	//SQL执行成功，读取所有记录行
    $list = mysqli_fetch_all($result, MYSQLI_ASSOC);
    var_dump( $list);
    if( count( explode(',',$list[0]['gifts'])) <3 && !empty($gift) ){
        $str = '';
        if(empty($list[0]['gifts'])){
            $str = $gift;
        }else{
            $str = $list[0]['gifts'].','.$gift;
        } 

        $sql = "update user set gifts = '$str'  WHERE tel='$tel' ";
        $result = mysqli_query($conn,$sql);

        echo $result;
    }else{
        echo 0;
    }
   
  

    
	

}