<?php 
include_once "../../common/mysql.php";

$categoryId = $_POST['categoryId'];
$name = $_POST['name'];
$slug = $_POST['slug'];
$classname = $_POST['classname'];

$conn = connect();

$sql = "update categories set name = '$name',slug = '$slug',classname='$classname' where id = $categoryId";

$bool = mysqli_query($conn,$sql);

$res = ["code" => 0 , "msg" => "更新分类信息失败"];

if($bool){
	$res["code"] = 1;
	$res["msg"] = "更新分类信息成功";
}

echo json_encode($res);



 ?>