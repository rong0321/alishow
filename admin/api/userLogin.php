<?php 
include_once"./../../common/mysql.php";
$email = $_POST['email'];
$password = $_POST['password'];

$conn = connect();

$sql = "select * from users where email='$email' and password='$password' and status='activated'";

$arr = query($conn,$sql);

$response = array("code" => 0,"msg" => "请求失败");

	if($arr){
		$response["code"] = 1;
		$response["msg"] = "请求成功";
		session_start();
		$_SESSION['userInfo'] = $arr[0];
	}

	echo json_encode($response);





 ?>