<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\www\tp\elian\public/../application/admin\view\login\index.html";i:1504509244;}*/ ?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel="stylesheet" href="__ADMIN__/css/reset.css">
    <link rel="stylesheet" href="__ADMIN__/css/supersized.css">
    <link rel="stylesheet" href="__ADMIN__/css/login.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>

<body>
    <div class="page-container">
        <h1>Login</h1>
        <form action="" method="post" class="loginform">
            <input type="text" name="username" class="username" placeholder="Username" datatype='*' errormsg="昵称至少6个字符,最多18个字符！">
            <input type="password" name="password" class="password" placeholder="Password" datatype='*'>
            <label class="check-label">
                <input class="checkcode" style="width:100px;float:left;" name="code" type="text">
                <img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" alt="captcha" />
            </label>
            <button type="submit" class="submit">Sign In</button>
        </form>
    </div>
    <!-- Javascript -->
    <script src="__ADMIN__/js/jquery-1.8.2.min.js"></script>
    <script src="__ADMIN__/js/supersized.3.2.7.min.js"></script>
    <script src="__ADMIN__/js/supersized-init.js"></script>
    <script src="__ADMIN__/js/Validform_v5.3.2_ncr_min.js"></script>
    <script src="__ADMIN__/js/scripts.js"></script>
</body>

</html>
