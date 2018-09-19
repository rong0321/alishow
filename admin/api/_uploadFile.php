<?php

$file = $_FILES['file'];

$ext = strrchr($file['name'],".");
$filename = time().mt_rand(1000,9999).$ext;

$bool = move_uploaded_file($file['tmp_name'],"../../static/uploads".$filename);

$res = ["code" => 0 , "msg" => "上传失败"];

if($bool){
    $res['code'] = 1;
    $res['msg'] = '上传成功';
    $res['src'] = '/static/uploads'.$filename;
}

echo json_encode($res);





?>