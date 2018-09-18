<?php 

include_once"../../common/mysql.php";

$conn = connect();

$sql = "select * from categories";

$arr = query($conn,$sql);

$response = ["code"=>0,"msg"=>"请求分类失败"];

if($arr){
	$response["code"] = 1;
	$response["msg"] = "请求分类成功";
	$response["data"] = $arr;
}


echo json_encode($response);








 ?>