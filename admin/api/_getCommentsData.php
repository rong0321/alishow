<?php
include_once "../../common/mysql.php";

$currentPage = $_POST['currentPage'];
$pageSize = $_POST['pageSize'];

$offset = ($currentPage - 1) * $pageSize;

$conn = connect();

$sql = "select c.id,c.author,c.content,c.created,c.`status`,p.title FROM comments as c
LEFT JOIN posts as p ON p.id = c.post_id
LIMIT $offset,$pageSize";

$arr = query($conn,$sql);

$countSql = "select count(*) as count from comments";
$count = query($conn,$countSql)[0]['count'];

$res = ["code" => 0 , "msg" => "查询失败"];

if($arr){
    $res['code'] = 1;
    $res['msg'] = "请求成功";
    $res['data'] = $arr;
    $res['count'] = $count;
}

echo json_encode($res);

?>