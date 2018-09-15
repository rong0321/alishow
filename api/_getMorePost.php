<?php 
	include_once "./../common/mysql.php";

	$categoryId = $_POST['categoryId'];
	$currentPage = $_POST['currentPage'];
	$pageSize = $_POST['pageSize'];

	$offset = ($currentPage - 1) * $pageSize;

	$conn = connect();

	$sql = "select p.id,p.title,p.created,p.content,p.views,p.likes,p.feature,u.nickname,c.`name`,
			(SELECT COUNT(*) from comments WHERE comments.post_id = p.id ) as commentsCount
			 from posts as p
			left join users as u on u.id = p.user_id
			left join categories as c on c.id = p.category_id
			WHERE p.category_id = {$categoryId}
			ORDER BY p.created DESC
			LIMIT $offset,$pageSize";

	$arr = query($conn,$sql);

	$countSql = "select count(*) as count from posts where category_id = $categoryId";
	$countArr = query($conn,$countSql);
	$count = $countArr[0]["count"];

	$response = array("code" => 0,"msg" => "请求失败");

	if($arr){
		$response["code"] = 1;
		$response["msg"] = "请求成功";
		$response["data"] = $arr;
		$response["count"] = $count;
	}

	echo json_encode($response);

 ?>