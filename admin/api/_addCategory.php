<?php 

include_once "../../common/mysql.php";

$name = $_POST['name'];
$slug = $_POST['slug'];
$classname = $_POST['classname'];

$conn = connect();
//查询是否重名
$sql = "select count(*) as count from categories where name = '{$name}'";

$count = query($conn,$sql)[0]['count'];

$res = ["code"=>0,"msg"=>"插入分类信息失败"];


if($count > 0){
	$res['msg'] = "插入分类信息重名";
}else{
	//不重名则添加数据到数据库
	$addSql = "insert into categories values(null,'$slug','$name','$classname')";
	$bool = mysqli_query($conn,$addSql);
	if($bool){
		$res['code'] = 1;
		$res['msg'] = "插入分类信息成功";
		$res['id'] = mysqli_insert_id($conn);
	}
}

echo json_encode($res);

 ?>