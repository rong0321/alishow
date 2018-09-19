<?php 

$currentPage = $_POST['currentPage'];
$pageSize = $_POST['pageSize'];
$category = $_POST['category'];
$status = $_POST['status'];


$offset = ($currentPage - 1)*$pageSize;

include_once "../../common/mysql.php";

$conn = connect();
//当status和category都为all的时候,where的条件是1=1永远成立,保证能查询所有数据的情况下还保留有where关键字,方便后面筛选
$where = " 1=1 ";

if($category != "all"){
	$where .= " and p.category_id = '$category' "; //开头和结尾空格不能少,防止拼接字符串的时候造成mysql语法错误
}
if($status != "all"){
	$where .= " and p.status = '$status' ";
}

$sql = "select p.id,p.title,p.created,p.`status`,u.nickname,c.`name`
 from posts as p
LEFT JOIN users as u on u.id = p.user_id
LEFT JOIN categories as c on c.id = p.category_id
where $where
limit $offset,$pageSize";

$countSql = "select count(*) as count from posts as p where $where ";
$count = query($conn,$countSql)[0]['count'];

$arr = query($conn,$sql);

$res = ["code" => 0 , "msg" => "请求失败"];

if($arr){
	$res["code"] = 1;
	$res["msg"] = "请求成功";
	$res["data"] = $arr;
	$res['count'] = $count;
}

echo json_encode($res);







 ?>