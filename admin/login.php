<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
</head>
<body>
  <div class="login">
    <form class="login-wrap">
      <img class="avatar" src="../static/assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger" style="display: none;">
        <strong>错误！</strong> <span id="error">用户名或密码错误！</span>
      </div>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" type="text" class="form-control" placeholder="邮箱" autofocus>
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" type="password" class="form-control" placeholder="密码">
      </div>
      <!-- <a class="btn btn-primary btn-block" href="index.php">登 录</a> -->
      <input type="submit" class="btn btn-primary btn-block" value="登 录"/>
    </form>
  </div>
</body>
<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script>
    $(".login-wrap").submit(function(){
      var email = $("#email").val();
      var password = $("#password").val();

      $.ajax({
        type:"post",
        url:"./api/userLogin.php",
        data:{
          email:email,
          password:password
        },
        dataType:"json",
        beforeSend:function(){
          var reg = /^\w+[@]\w+[.]\w+$/;
          if(!reg.test(email)){
              $('.alert').show();
              $("#error").html("您输入的邮箱格式不正确");
              return false;
            }
          if(password.trim() == ''){
              $('.alert').show();
              $("#error").html("您输入的密码为空");
              return false;
            }
  
        },
        success:function(res){
          // console.log(res);
            if(res.code ==1){
              location.href = "index.php";
            }else{
              $('.alert').show();
              $("#error").html("用户名或密码错误！");
            }


        }

      })





      event.preventDefault();
      // return false;
    })




</script>
</html>
