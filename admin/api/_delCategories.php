<?php 

include_once "../../common/mysql.php";

$ids = $_POST['ids'];

$conn = connect();

$sql = "delete from categories where id in({$ids})";

$bool = mysqli_query($conn,$sql);

$res = ["code" => 0 , "msg" => "删除失败"];

if($bool){
	$res['code'] = 1;
	$res['msg'] = '删除成功';
}


echo json_encode($res);




 ?>