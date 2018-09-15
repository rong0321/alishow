<?php 
include_once"./common/mysql.php";

$categoryId = $_GET['categoryId'];

// $conn = mysqli_connect("localhost","root","root","alishow");
$conn = connect();

$sql = "select p.id,p.title,p.created,p.content,p.views,p.likes,p.feature,u.nickname,c.`name`,
(SELECT COUNT(*) from comments WHERE comments.post_id = p.id ) as commentsCount
 from posts as p
left join users as u on u.id = p.user_id
left join categories as c on c.id = p.category_id
WHERE p.category_id = {$categoryId}
ORDER BY p.created DESC
LIMIT 10";

// $postRes = mysqli_query($conn,$sql);

// while($row = mysqli_fetch_assoc($postRes)){
//   $postArr[] = $row;
// }

$postArr = query($conn,$sql);


// print_r($postArr);




 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="static/assets/css/style.css">
  <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <?php include_once "./common/header.php" ?>
    <div class="content">
      <div class="panel new">
        <h3><?= $postArr[0]['name'] ?></h3>
        <?php foreach ($postArr as $value): ?>
          <div class="entry">
          <div class="head">
            <a href="./detail.php?postId=<?= $value['id']?>"><?= $value['title']?></a>
          </div>
          <div class="main">
            <p class="info"><?= $value['nickname']?> 发表于 <?= $value['created']?></p>
            <p class="brief"><?= $value['content']?></p>
            <p class="extra">
              <span class="reading">阅读(<?= $value['views']?>)</span>
              <span class="comment">评论(<?= $value['commentsCount']?>)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?= $value['likes']?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span><?= $value['name']?></span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="<?= $value['feature']?>" alt="">
            </a>
          </div>
          </div>
        <?php endforeach; ?>
        <!-- <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div> -->
        <div class="loadmore">
          <span class="btn">加载更多</span>
       </div>
      </div>
       
    </div>

   


    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="./static/assets/vendors/jquery/jquery.js"></script>
  <script src="./static/assets/vendors/art-template/template-web.js"></script>
  <script type="text/template" id="cateTPL">
   {{ each data }} 
    <div class="entry">
          <div class="head">
            <a href="./detail.php?postId={{$value['id']}}">{{$value['title']}}</a>
          </div>
          <div class="main">
            <p class="info">{{$value['nickname']}} 发表于 {{$value['created']}}</p>
            <p class="brief">{{$value['content']}}</p>
            <p class="extra">
              <span class="reading">阅读({{$value['views']}})</span>
              <span class="comment">评论({{$value['commentsCount']}})</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞({{$value['likes']}})</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>{{$value['name']}}</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="{{$value['feature']}}" alt="">
            </a>
          </div>
          </div>
    {{ /each }}
  </script>
  <script>
    var currentPage = 1;
    var categoryId = location.search.split("=")[1];
    var pageSize = 10;
    $('.loadmore .btn').click(function(){
        
        currentPage++;
        $.ajax({
          type:"post",
          url:"./api/_getMorePost.php",
          data:{
            categoryId:categoryId,
            currentPage:currentPage,
            pageSize:pageSize
          },
          dataType:"json",
          success:function(res){
            if(res.code == 1){
              var html = template("cateTPL",res);
              $(html).insertBefore(".loadmore");

              var maxPage = Math.ceil(res.count/pageSize);
              if(currentPage == maxPage){
                $(".loadmore .btn").hide();
              }
            }

          }
        })
    })

  </script>
</body>
</html>