<?php 

include_once"./checkLogin.php";

 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
   <!--  <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav> -->
    <?php include_once"./common/nav.php" ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger" style="display: none;">
        <strong>错误！</strong><span id="error"></span>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form>
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <label for="classname">类名</label>
              <input id="classname" class="form-control" name="classname" type="text" placeholder="类名">
            </div>
            <div class="form-group">
              <!-- <button class="btn btn-primary" type="submit">添加</button> -->
              <input type="button" value="添加" class="btn btn-primary" id="btn-add">
              <input type="button" value="编辑完成" class="btn btn-primary" id="btn-edit" style="display: none;">
              <input type="button" value="取消编辑" class="btn btn-primary" id="btn-cancel" style="display: none;">
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a id="delAll" class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>类名</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td>fa-fire</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr> -->
              <!-- <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td>fa-fire</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td>fa-fire</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
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
          <li><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li class="active"><a href="categories.php">分类目录</a></li>
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
  <script type="text/template" id="cateTPL">
    {{each data}}
    <tr data-categoryId="{{$value['id']}}">
      <td class="text-center"><input type="checkbox"></td>
      <td>{{$value['name']}}</td>
      <td>{{$value['slug']}}</td>
      <td>{{$value['classname']}}</td>
      <td class="text-center">
        <a href="javascript:;" data-categoryId="{{$value['id']}}" class="btn btn-info btn-xs edit">编辑</a>
        <a href="javascript:;" class="btn btn-danger btn-xs del">删除</a>
      </td>
    </tr>
    {{/each}}
  </script>
    <script type="text/template" id="addCategoryTPL">

    <tr data-categoryId="{{id}}">
      <td class="text-center"><input type="checkbox"></td>
      <td>{{name}}</td>
      <td>{{slug}}</td>
      <td>{{classname}}</td>
      <td class="text-center">
        <a href="javascript:;" data-categoryId="{{id}}" class="btn btn-info btn-xs edit">编辑</a>
        <a href="javascript:;" class="btn btn-danger btn-xs del">删除</a>
      </td>
    </tr>

  </script>
  <script>
    $(function(){
      //请求分类数据
      $.ajax({
        type:"post",
        url:"./api/_getCategoriesData.php",
        dataType:"json",
        success:function(res){
          if(res.code == 1){
            var html = template("cateTPL",res);

            $("tbody").html(html);
          }
          


        }

      })

      //添加按钮事件
      $("#btn-add").click(function(){
        var name = $("#name").val();
        var slug = $("#slug").val();
        var classname = $("#classname").val();

        $.ajax({
          type:"post",
          url:"./api/_addCategory.php",
          data:{
            name:name,
            slug:slug,
            classname:classname
          },
          dataType:"json",
          beforeSend:function(){
            if(name.trim()==''||slug.trim()==''||classname.trim()==''){
              $("#error").html("请填写完整信息");
              $(".alert").show();
              return false;
            }
          },
          success:function(res){
            if(res.code == 1){
              var html = template("addCategoryTPL",{
                name:name,
                slug:slug,
                classname:classname,
                id:res.id
              });
              $(html).appendTo("tbody");
              $(".alert").hide();
              $("#name").val('');
              $("#slug").val('');
              $("#classname").val('');
            }else{
              $("#error").html(res.msg);
              $(".alert").show();
            }
          }
        })
      })

      var that = null;
      //编辑按钮事件
      $('tbody').on('click','.edit',function(){
        that = this;

        var categoryID = $(this).attr('data-categoryId');
        $('#btn-edit').attr('data-categoryId',categoryID);

        $('#btn-add').hide();
        $('#btn-edit').show();
        $('#btn-cancel').show();

        var name = $(this).parent().parent().children().eq(1).text();
        var slug = $(this).parent().parent().children().eq(2).text();
        var classname = $(this).parent().parent().children().eq(3).text();

        $('#name').val(name);
        $('#slug').val(slug);
        $('#classname').val(classname);

      })

      //编辑完成按钮事件
      $('#btn-edit').click(function(){
        var categoryId = $(this).attr('data-categoryId');
        var name = $("#name").val();
        var slug = $("#slug").val();
        var classname = $("#classname").val();

        $.ajax({
          type:'post',
          url:'./api/_updateCategory.php',
          data:{
            categoryId:categoryId,
            name:name,
            slug:slug,
            classname:classname
          },
          dataType:'json',
          success:function(res){
            if(res.code == 1){
              $(that).parent().parent().children().eq(1).text(name);
              $(that).parent().parent().children().eq(2).text(slug);
              $(that).parent().parent().children().eq(3).text(classname);
              $("#name").val('');
              $("#slug").val('');
              $("#classname").val('');
              $('#btn-add').show();
              $('#btn-edit').hide();
              $('#btn-cancel').hide();
            }
           
          }




        })

      })

      //取消编辑按钮事件
      $('#btn-cancel').click(function(){
        $("#name").val('');
        $("#slug").val('');
        $("#classname").val('');
        $('#btn-add').show();
        $('#btn-edit').hide();
        $('#btn-cancel').hide();
      })


      //删除按钮事件
      $('tbody').on('click','.del',function(){
        var row = $(this).parents('tr'); // 等效于$(this).parent().parent() ,这个也是找到爷爷辈的tr.
        var categoryId = row.attr('data-categoryId');

        $.ajax({
          type:"post",
          url:"./api/_delCategory.php",
          data:{categoryId:categoryId},
          dataType:"json",
          success:function(res){
            if(res.code == 1){
              row.remove();
            } 
          }
        })

      })

      //全选按钮
      $('thead :checkbox').click(function(){
        var status = $(this).prop('checked');
        $('tbody :checkbox').prop('checked',status);
        if(status){
          $('#delAll').show();
        }else{
          $('#delAll').hide();
        }
      })

      //下面复选框选中,判断全选按钮选中状态
      $('tbody').on('click',':checkbox',function(){
        var all = $('thead :checkbox');
        var cks = $('tbody :checkbox');

        all.prop('checked',cks.length == $('tbody :checked').length);

        if($('tbody :checked').length >= 2){
          $('#delAll').show();
        }else{
          $('#delAll').hide();
        }
      })

      //批量删除按钮事件
      $('#delAll').click(function(){
        var checkedList = $('tbody :checked');

        var arr = [];
        checkedList.each(function(index,dom){
          var id = $(dom).parents('tr').attr('data-categoryId');
          arr.push(id);
        })

        var ids = arr.join();

        $.ajax({
          type:"post",
          url:"./api/_delCategories.php",
          data:{
            ids:ids
          },
          dataType:"json",
          success:function(res){
            if(res.code == 1){
              checkedList.parent().parent().remove();
              $('#delAll').hide();
            }
          }


        })


      })

    })




  </script>
</body>
</html>
