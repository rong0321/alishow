<?php 

include_once"./checkLogin.php";

 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <!-- <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav> -->
    <?php include_once"./common/nav.php" ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="post-add.php" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline">
          <select id="category" name="" class="form-control input-sm">
            <<!-- option value="">所有分类</option>
            <option value="">未分类</option> -->
          </select>
          <select id="status" name="" class="form-control input-sm">
            <option value="all">所有状态</option>
            <option value="drafted">草稿</option>
            <option value="published">已发布</option>
            <option value="trashed">已作废</option>
          </select>
          <!-- <button class="btn btn-default btn-sm">筛选</button> -->
          <input type="button" value="筛选" class="btn btn-default btn-sm" id="btn-filter">
        </form>
        <ul class="pagination pagination-sm pull-right">
          <!-- <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li> -->
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr> -->
        </tbody>
      </table>
    </div>
  </div>
  <?php include_once"./common/aside.php" ?>
<!--   <div class="aside">
    <div class="profile">
      <img class="avatar" src="../static/uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li class="active"><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.php">导航菜单</a></li>
          <li><a href="slides.php">图片轮播</a></li>
          <li><a href="settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div> -->

  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script src="../static/assets/vendors/art-template/template-web.js"></script>
  <script>NProgress.done()</script>
  <!-- 文章模板 -->
  <script type="text/template" id="postsTPL">
    {{each data}}
    <tr>
      <td class="text-center"><input type="checkbox"></td>
      <td>{{$value.title}}</td>
      <td>{{$value.nickname}}</td>
      <td>{{$value.name}}</td>
      <td class="text-center">{{$value.created}}</td>
      <td class="text-center">
        {{if($value.status == 'drafted')}}
          草稿
        {{else if($value.status == 'published')}}
          已发布
        {{else if($value.status == 'trashed')}}
          已作废
        {{/if}}
      </td>
      <td class="text-center">
        <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
        <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
      </td>
    </tr>
    {{/each}}
  </script>
  <!-- 页签模板 -->
  <script type="text/template" id="paginationTPL">
    <li {{if(currentPage <= 1 )}} style="display: none;" {{/if}} data-page='{{currentPage - 1}}'><a href="javascript:;">上一页</a></li>
    <li {{if(currentPage - 2 <= 0 )}} style="display: none;" {{/if}} data-page='{{currentPage - 2}}'><a href="javascript:;">{{currentPage - 2}}</a></li>
    <li {{if(currentPage - 1 <= 0 )}} style="display: none;" {{/if}} data-page='{{currentPage - 1}}'><a href="javascript:;">{{currentPage - 1}}</a></li>
    <li class="active"><a href="javascript:;">{{currentPage}}</a></li>
    <li {{if(currentPage + 1 > maxPage )}} style="display: none;" {{/if}} data-page='{{currentPage + 1}}'><a href="javascript:;">{{currentPage + 1}}</a></li>
    <li {{if(currentPage + 2 > maxPage )}} style="display: none;" {{/if}} data-page='{{currentPage + 2}}'><a href="javascript:;">{{currentPage + 2}}</a></li>
    <li {{if(currentPage >= maxPage )}} style="display: none;" {{/if}} data-page='{{currentPage + 1}}'><a href="javascript:;">下一页</a></li>
  </script>

  <!-- 分类部分 -->
  <script type="text/template" id="categoryTPL">
    <option value="all">所有分类</option>
    {{each data}}
    <option value="{{$value.id}}">{{$value.name}}</option>
    {{/each}}
  </script>


  <script>
    //初始页面
    var currentPage = 1;
    var pageSize = 20;
    var category = "all";
    var status = "all";
//将渲染页面做了封装
function getPostsData(currentPage,pageSize,category,status){
  $.ajax({
      type:"post",
      url:"./api/_getPosts.php",
      data:{
        currentPage:currentPage,
        pageSize:pageSize,
        category:category,
        status:status
      },
      dataType:"json",
      success:function(res){
        if(res.code == 1){
          var html = template("postsTPL",res);
          // $(html).appendTo('tbody');
          $('tbody').html(html);

          var maxPage = Math.ceil(res.count/pageSize);
          var paginationHtml = template("paginationTPL",{currentPage:currentPage,maxPage:maxPage});
          $('.pagination').html(paginationHtml);

        }
      }
    })
}
  //第一次请求页面
  getPostsData(currentPage,pageSize,category,status);

  //换页功能
  $('.pagination').on('click','li',function(){
    currentPage = parseInt($(this).attr('data-page'));
    // alert(currentPage);
    getPostsData(currentPage,pageSize,category,status);

  })


  //动态生成分类
  $.ajax({
    type:"get",
    url:"./api/_getCategoriesData.php",
    dataType:"json",
    success:function(res){
      if(res.code == 1){
        var html = template("categoryTPL",res);
        $('#category').html(html);
      }
    }




  })


  //筛选功能
  $('#btn-filter').click(function(){
    category = $('#category').val();
    status = $('#status').val();
    currentPage = 1; //点击的时候让currentPage重置为1,防止切换筛选条件之后,页数还是在当前页

    getPostsData(currentPage,pageSize,category,status);


    })


  </script>
</body>
</html>
