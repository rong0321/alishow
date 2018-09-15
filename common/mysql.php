<?php 

function connect(){
	$conn = mysqli_connect("localhost","root","root","alishow");

	return $conn;
}


function query($conn,$sql){
	

	$res = mysqli_query($conn,$sql);

	$arr = [];
	while($row = mysqli_fetch_assoc($res)){
		$arr[] = $row;
	}

	return $arr;
}











 ?>