<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"D:\www\tp\elian\thinkphp\tpl\dispatch_jump.tpl";i:1498453365;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: "Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 16px; }
        .system-message{
            width: 400px;margin:0 auto;border:solid 1px #ccc;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            margin-top: 200px;
        }
        .system-message dt{ color:#666;text-align: center;border-bottom: solid 1px #ccc;line-height: 30px;font-size: 12px;}
        .system-message .detail{ padding: 15px 0;text-align: center;}
        .system-message .jump{ line-height: 30px;text-align: center;font-size: 12px;color:#ccc;}
        .system-message .jump a{color:red;}
    </style>
</head>
<body>
    <div class="system-message">
        <dl>
            <dt>温馨提示</dt>
            <dd class="detail"><?php switch ($code) {case 1:?>
            <span class="success"><span style="color:green;padding-right:10px;font-size:30px;">☺</span><?php echo(strip_tags($msg));?></span>
            <?php break;case 0:?>
            <span class="error"><span style="color:red;padding-right:10px;font-size:30px;">&#9785;</span><?php echo(strip_tags($msg));?></span>
            <?php break;} ?></dd>
        <dd class="jump">页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b></dd>
        </dl>
    </div>
    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html>
